<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>insertion dans la base de données</title>
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
	
	$p = $_GET['p'];
	$j = $_GET['j'];
	$n = $_GET['n'];
	$req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
	$req->execute(array(
	'nvprix' => $p,
	'nv_nb_joueurs' => $j,
	'nom_jeu' => $n
	));
	?>
	</body>
</html>