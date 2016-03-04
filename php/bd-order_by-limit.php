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
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console=\'Xbox\' OR console=\'PS2\' ORDER BY prix DESC LIMIT 0,10'); //LIMIT position du debut, position de fin

	while ($donnees = $reponse->fetch())
	{
		$format = '<p>Le jeu <strong>%s</strong> appartient à %s, fonctionne sur %s et il le vend à %g$</p>';
		echo sprintf ($format, $donnees['nom'], $donnees['possesseur'], $donnees['console'], $donnees['prix']);
		//echo '<p>' . $donnees['ID'] . ': Le Jeu ' . $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . ' et il le vend à ' . $donnees['prix'] . '$ <br /> ce jeu fonctionne sur ' . $donnees['console'] . ' et on peux y jouer à ' . $donnees['nbre_joueurs_max'] . ' enfin ' . $donnees['possesseur'] . ' a laisser un commontaire sur ce jeu:<br />' . $donnees['commentaires'] . '</p>';
	}
	$reponse = $bdd->query('SELECT possesseur FROM jeux_video ORDER BY possesseur');
	while ($donnees = $reponse->fetch())
	{
		echo '<p>' . $donnees['possesseur'] . '</p>';
	}
	//Cela veut dire qu'on a terminé le travail sur la requête (query)
	$reponse->closeCursor();
	
	?>
</body>
</html>