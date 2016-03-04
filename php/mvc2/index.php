<?php
//On démarre la session
session_start();
 
//On se connecte à MySQL
$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
//On inclut le contrôleur s'il existe et s'il est spécifié
if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
{
        include 'controleurs/'.$_GET['page'].'.php';
}
else
{
        include 'controleurs/accueil.php';
}
 
//On ferme la connexion à MySQL

