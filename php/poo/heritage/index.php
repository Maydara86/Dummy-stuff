<?php
//on prépare une pile de class
function chargerClass ($classname)
{
  require $classname . '.php';
}
spl_autoload_register('chargerClass');

session_start();

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$manager = new CharactersManager ($db);

if (isset($_SESSION['perso'])) // Si la session perso existe, on restaure l'objet.
{
  $perso = $_SESSION['perso'];
  $perso = $manager->select($perso->id());
}

// on vérifie les possibilités
if (isset($_POST['creer']) && isset($_POST['nom']))
{
  switch ($_POST['type'])
  {
    case 'magicien' :
      $perso = new Magicien(['nom' => $_POST['nom']]);
      break;
    
    case 'guerrier' :
      $perso = new Guerrier(['nom' => $_POST['nom']]);
      break;
    
    default :
      $message = 'Le type du personnage est invalide.';
      break;
  }
  
  if (!$perso->nomValide())
  {
    $message = 'le nom que vous avez choisi n\'est pas valide';
    unset($perso);
  }
  elseif ($manager->verifiy($perso->nom())) // on verifie qu'il n'y a pas de doublons dans la DB
  {
    $message = 'ce nom existe déjà dans la BDD';
    unset($perso);
  }
  else
  {
    $manager->save($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom']))
{
  if (!$manager->verifiy($_POST['nom']))
  {
    $message = 'le nom que vous avez choisi n\'existe pas dans la DB';
  }
  else
  {
    $perso = $manager->select($_POST['nom']);
    if ((time() - strtotime($perso->date_connection())) > 600)
    {
      $degat = $perso->degat() - 10;
      $perso->setDegat($degat);
      $manager->modify($perso);
    }
    $manager->saveTimeConnection ($perso);
    $perso->verifieCoup();
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
    <?php echo '<h1>Il y\'a  '.$manager->count().' Personnages dans la base</h1>'; 

    if (isset($_GET['ensorceler']) && $perso->type() == 'magicien')
    {
      $x = $manager->select((int)$_GET['ensorceler']);
      $retour = $perso->lancerSort($x);
      switch ($retour)
      {
        case Characters::CEST_MOI :
        $message = 'Je ne peux pas m\'ensorceler moi même ;p ';
        break;

        case Characters::NO_MAGIC:
        $message = 'Je n\'ai plus de magie :s ';
        break;

        case Characters::LANCER_SORT:
        $message = 'Personnage Endormi :) ';
        $manager->modify($x);
        break;
      }
    }
    if (isset($_GET['frapper']))
      {
        $x = $manager->select((int)$_GET['frapper']);
        $retour = $perso->frapper($x);
        switch($retour)
        {
          case Characters::CEST_MOI : //CE CAS MARCHE BIEN
          $message = "je ne peux pas me frapper moi même ;p";
          break;

          case Characters::PERSONNAGE_FRAPPE : //CE CAS MARCHE BIEN
          $message = "le Personnage à bien etait frapper";
          $manager->modify($perso);
          $manager->saveTime($perso);
          $time = $_SERVER['REQUEST_TIME'];
          $manager->modify($x);
          break;
          
          case Characters::PERSONNAGE_TUE : //CE CAS MARCHE BIEN
          $message = "le Personnage que vous venez de frapper est mort";
          $manager->modify($perso);
          $manager->saveTime($perso);
          $time = $_SERVER['REQUEST_TIME'];
          $manager->delete($x);
          break;

          case Characters::PERSONNAGE_LIMIT:
            $message = "Le Personnage est épuiser, revenez plus tard";
            break;

          case Personnage::PERSONNAGE_ENDORMI :
            $message = 'Vous êtes endormi, vous ne pouvez pas lancer de sort !';
            break;
        }
      }
    if (isset($message)) // On a un message à afficher ?
      echo '<h3>', $message, '</h3>'; // Si oui, on l'affiche.
    ?>
    <?php
    
    if (isset($_GET['deco']))
    {
      session_destroy();
      header('Location: .');
      exit();
    }
    if (isset($perso)) //si on est entrain d'utiliser un objet personage...
    {
      echo '<p><a href="?deco=1">Déconnexion</a></p>';
      echo '<p>Mes informations:</p>';
      echo '<p>Nom: '.$perso->nom().'</p>';
      echo '<p>Type: '.ucfirst($perso->type()).'</p>';
      echo '<p>Dégât: '.$perso->degat().'</p>';
      echo '<p>Atout: '.$perso->atout().'</p>';
      echo '<p>Experience: '.$perso->experience().'</p>';
      echo '<p>Niveau: '.$perso->niveau().'</p>';
      echo '<p>Puissance: '.$perso->puissance().'</p>';
      echo '<p>Nombre de coups: '.$perso->coup().'</p>';
      echo '<p>Date: '.$perso->date_connection().'</p>';
      echo '</br><p>Qui frapper?</p>';
      $tab = $manager->getList($perso->nom());
      if (empty($tab))
      {
        echo 'Personne à frapper !';
      }
      else
      {
        if ($perso->time_endormi() > time())
        {
          $reveil = $perso->time_endormi() - time();
          echo 'Un magicien vous a endormi ! Vous allez vous réveiller dans ' . date('i:s',$reveil);
        }
        else
        {
          foreach ($tab as $key => $value) 
            {
              echo '<p><a href="?frapper='. $value->id() .'">' . $value->nom() . '</a> (dégâts: ' . $value->degat() . ') | ' . ucfirst($value->type()) . ' ';
              if ($perso->type() == 'magicien')
              {
                echo '| <a href="?ensorceler=', $value->id(), '">Lancer un sort</a></p>';
              }
            }
        }
      }
    }
    else
    {
    ?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" /> <input type="submit" value="Utiliser ce personnage" name="utiliser" />
        Type :
        <select name="type">
          <option value="magicien">Magicien</option>
          <option value="guerrier">Guerrier</option>
        </select>
        <input type="submit" value="Créer ce personnage" name="creer" />
        
      </p>
    </form>
    <?php
     } 
     if (isset($perso)) // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
{
  $_SESSION['perso'] = $perso;
}
     if (isset($time))
     {
        $_SESSION['t'] = $time;
     }
     ?>
  </body>
</html>