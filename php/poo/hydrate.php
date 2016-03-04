<html>
   <head>
   	<meta charset='utf-8' />
       <title></title>
   </head>
   <body>
<?php
require 'connexion-bdd.php';
require 'autoload.php';

$request = $bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');
/*while ($perso = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
  echo $perso['nom'], ' a ', $perso['forcePerso'], ' de force, ', $perso['degats'], ' de dégâts, ', $perso['experience'], ' d\'expérience et est au niveau ', $perso['niveau'];
}
*/
while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
{
	$maydara = new Personnage ($donnees);
	echo '<p>' . $maydara->affichePerso() . '</p>';
}
//$maydara = new Personnage ($donnees);
//echo $maydara->affichePerso();
?>
</body>
</html>
