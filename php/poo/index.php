<?php
include_once('membre.class.php');
include_once('admin.class.php');
$membre = new Membre('Maydara');
echo $membre->getPseudo() . ', Bienvenue !<br />';
$membre->setPseudo('Zoudak');
echo $membre->getPseudo() . '<br />';
$admin = new Admin('Maydara');
echo $admin->getPseudo() . ', Admin<br />';
$admin->setCouleur('blue');
echo $admin->getCouleur() . '<br />';
$admin->setPseudo('Vander');
echo $admin->getPseudo();