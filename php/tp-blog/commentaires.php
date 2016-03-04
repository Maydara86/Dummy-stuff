<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
   	<link type="text/css" rel="stylesheet" href="style.css"/>
       <title>Billet et Commentaires</title>
   </head>
   <body>
   	<h1>Mon Super Blog!</h1>
   	<p><a href="index.php">Retour à la liste des billets</a></p>
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$request = $bdd->prepare("SELECT titre, contenu, date_creation FROM billets WHERE id=:id"); 
	$request->execute(array('id' => $_GET['c']));
	$donnees = $request->fetch();
	echo '<div class="news"><h3 class="news">'. htmlspecialchars($donnees['titre']) . ' <em>' . $donnees['date_creation'] . '</em></h3>';
	echo '<p class="news">' . htmlspecialchars($donnees['contenu']) . '</p></div>';
	$request->closeCursor();

	$request = $bdd->prepare("SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr FROM commentaires WHERE id_billet= ? ORDER BY date_commentaire DESC LIMIT 0, 5"); 
	$request->execute(array($_GET['c']));
	echo '<h2><strong>Commentaire</strong></h2>';
	while ($donnees = $request->fetch())
	{
		echo '<p><strong>'. htmlspecialchars($donnees['auteur']) . '</strong> le ' . $donnees['date_creation_fr'] . '</p>';
		echo '<p> - ' . htmlspecialchars($donnees['commentaire']) . '</p>';
	}
	$request->closeCursor();
	?>
	</body>
</html>