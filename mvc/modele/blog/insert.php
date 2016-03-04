<?php

if (isset($_POST['titre']) && isset($_POST['contenu']))
{
	$request = $bdd->prepare ('INSERT INTO billets(titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
	$request->execute (array ('titre' => $_POST['titre'],
								'contenu' => $_POST['contenu']
								));
}