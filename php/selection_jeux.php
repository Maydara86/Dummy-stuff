<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>Connexion à la base de données</title>
   </head>
   <body>
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT * FROM jeux_video WHERE console = :console OR possesseur = :possesseur  AND prix <= :prix ORDER BY prix DESC');
	$req->execute(array('possesseur' => $_GET['possesseur'], 'prix' => $_GET['prix_max'], 'console' => $_GET['console']));

	echo '<ul>';
	while ($donnees = $req->fetch())
	{
		echo '<li>' . $donnees['console'] . ': ' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
	}
	echo '</ul>';

	$req->closeCursor();


/*try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
$req->execute(array($_GET['possesseur'], $_GET['prix_max']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();

*/
	?>
</body>
</html>