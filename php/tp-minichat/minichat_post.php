<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	if (isset($_POST))
	{
		$request = $bdd -> prepare ('INSERT INTO minichat (pseudo, message) VALUES (:pseudo, :message)');
		$request->execute (array ('pseudo' => $_POST['pseudo'], 'message' => $_POST['message']));
		$request->closeCursor();
		// rediriger vers minichat.php comme ceci :
		setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
		header('Location: minichat.php');
	}
	else
	{
		echo 'veillez saisir tout les champs SVP';
	}
?>