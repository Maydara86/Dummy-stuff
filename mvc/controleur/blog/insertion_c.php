<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
if (isset($_POST['titre']) && isset($_POST['contenu']))
{
	global $bdd;
	$request = $bdd->prepare ('INSERT INTO billets(titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
	$request->execute (array ('titre' => $_POST['titre'],
								'contenu' => $_POST['contenu']
								));
}
