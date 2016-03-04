<?php
include_once('membre.class.php');

class Admin extends Membre
{
    private $couleur;

    public function setCouleur($color)
    {
        $this->couleur = $color;
    }
    
    public function getCouleur()
    {
        return $this->couleur;
    }
}