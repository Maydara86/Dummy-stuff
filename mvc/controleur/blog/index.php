<?php

// On demande les 5 derniers billets (modèle)
include('modele/blog/get_billets.php');
//include_once('modele/blog/get_date.php');

if (isset($_GET['p']))
{
	$cPage = $_GET['p'];
}

$nbrArt = get_nbrArt(); // le nombre d'article
$cPage = 1; // la page courrante
$nPage = ceil($nbrArt / 5); // le nombre de page

$billets = get_billets((($cPage - 1) * 5), 5);
//$billets = get_date(2,20);

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($billets as $cle => $billet)
{
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}

// On affiche la page (vue)
include('vue/blog/index.php');