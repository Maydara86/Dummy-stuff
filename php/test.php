<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>insertion dans la base de données</title>
   </head>
   <body>
<!--	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	//$request = $bdd->query("SELECT AVG(prix) AS p FROM jeux_video WHERE possesseur = 'Hamma' AND console = 'PC'");
	//$request = $bdd->query("SELECT SUM(nbre_joueurs_max) AS p FROM jeux_video");
	//$request = $bdd->query("SELECT COUNT(DISTINCT console) AS p FROM jeux_video");
	//$request = $bdd->query("SELECT AVG(prix) AS p, console FROM jeux_video GROUP BY console");
	//$request = $bdd->query("SELECT COUNT(nom) AS p, possesseur FROM jeux_video GROUP BY possesseur");
	$request = $bdd->query("SELECT AVG(prix) AS p, console FROM jeux_video GROUP BY console HAVING p <= 10"); 
	while ($reponse = $request->fetch())
	{
		echo '<p>' . $reponse['p'] . ' - ' . $reponse['console'] . '</p>';
	}
	$request->closeCursor();
	?>-->
	<p>
<?php
if (isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}(\.[a-z]{2,4}){1}$#", $_POST['mail']))
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
    }
    else
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?>
</p>

<form action= "test.php" method="post">
<p>
    <label for="mail">Votre mail ?</label> <input id="mail" name="mail" /><br /> 
    <input type="submit" value="Vérifier le mail" />
</p>
</form>
	</body>
</html>