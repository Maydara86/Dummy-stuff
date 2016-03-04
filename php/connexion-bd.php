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
	$reponse = $bdd->query('SELECT * FROM jeux_video');

	while ($donnees = $reponse->fetch())
	{
		$format = '<p>%d: Le jeu <strong>%s</strong> appartient à %s et il le vend à %g$<br />ce jeu fonctionne sur %s et on peux y jouer à %d, enfin %s a laisser un commentaire sur <strong>%s</strong>:<br />"%s"';
		echo sprintf ($format, $donnees['ID'], $donnees['nom'], $donnees['possesseur'], $donnees['prix'], $donnees['console'], $donnees['nbre_joueurs_max'], $donnees['possesseur'], $donnees['nom'], $donnees['commentaires']);
	}

	//Cela veut dire qu'on a terminé le travail sur la requête (query)
	$reponse->closeCursor();
	
	?>
</body>
</html>