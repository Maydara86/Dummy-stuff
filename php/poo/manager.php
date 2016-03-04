<?php
require 'autoload.php';
require 'connexion-bdd.php';


$perso = new Personnage([
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);

//$perso->affichePerso();
$manager = new PersonnagesManager($db);

$id = 5;
$i = $manager->get($id);
$degats = 60;
$i->setDegats($degats);
$manager->update($i);
//$i->affichePerso();

//$manager->add($perso);
//$manager->delete($i);
$persos = $manager->getList();

foreach ($persos as $perso)
{
	echo '<p>' . $perso->affichePerso() . '</p>';
}
