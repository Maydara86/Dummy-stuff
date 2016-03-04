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
	if (isset($_POST['nom']))
		{
		$request = $bdd->prepare ('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
		$request->execute (array ('nom' => $_POST['nom'],
									'possesseur' => $_POST['possesseur'],
									'console' => $_POST['console'],
									'prix' => $_POST['prix'],
									'nbre_joueurs_max' => $_POST['nbr'],
									'commentaires' => $_POST['commentaires']
									));
		echo 'Insertion réuissit.<br />' . var_dump($_POST);
		}
		else 
		{
			echo '<h1>Il faut remplir tout les champs SVP</h1>' . var_dump($_POST['nom']);
		}
	$request->closeCursor();
	?>
	</body>
</html>