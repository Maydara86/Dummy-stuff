<?php
function get_nbrArt ()
{
	global $bdd;
	$req = $bdd->query("SELECT COUNT(id) AS nbrArt FROM billets");
	$nbrArt = $req->fetch();
	return $nbrArt['nbrArt'];
}

function get_billets($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset; //offset est la valeur de la postition du début de la séléction depuis la base de données 
    $limit = (int) $limit; //limit est la valeur du nombre des données à séléctioner
        
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}

