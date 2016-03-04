<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
   	<link type="text/css" rel="stylesheet" href="style.css"/>
       <title>Blog</title>
   </head>
   <body>
   	<h1>Mon Super Blog!</h1>
   	<p><strong>Dérniers Billets du Blog:</strong></p>
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$request = $bdd->query("SELECT * FROM billets ORDER BY date_creation DESC"); 
	while ($donnees = $request->fetch())
	{
		echo '<div class="news"><h3 class="news">'. htmlspecialchars($donnees['titre']) . '</h3>';
		echo '<p class="news">' . nl2br(htmlspecialchars($donnees['contenu'])) . '<br /><a href="commentaires.php?c=' . $donnees['id'] . '">Commentaires</a></p></div>'; //nl2br () conserve les retours à la ligne saisie dans le contenu. 
	}
	$request->closeCursor();
	?>
	</body>
</html>