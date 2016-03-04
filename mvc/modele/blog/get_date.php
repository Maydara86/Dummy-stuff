<?php
function get_date($a,$b)
{
    global $bdd;
       
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(DATE_ADD(date_creation, INTERVAL 10 DAY), \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :a, :b');
    $req->bindParam(':a', $a, PDO::PARAM_INT);
    $req->bindParam(':b', $b, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}