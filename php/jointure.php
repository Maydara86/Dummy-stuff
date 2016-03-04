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
	/*						****************JOINTURE*************

	$request = $bdd->exec('UPDATE jeux_video2 J INNER JOIN proprietaire P ON J.possesseur = P.nom SET J.id_proprietaire = P.id;'); */
	
	$request = $bdd->query('SELECT j.nom nj, p.nom np FROM jeux_video2 j INNER JOIN proprietaire p ON j.id_proprietaire = p.id');
	while ($donnees = $request->fetch())
	{
		echo '<p>'.$donnees['nj'].' - '.$donnees['np'].'</p>';
	}
	$request->closeCursor();
	?>
	</body>
</html>