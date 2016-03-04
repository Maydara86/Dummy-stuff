<?php
include 'CharactersManager.php';
include 'Characters.php';
$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$x = new CharactersManager ($db);
$a = $x->select('serena');
/*$a = new Characters ([
					  'id'=>44,
					  'nom'=>'lele',
					  'degat'=>75,
					  'experience'=>50,
					  'niveau'=>23,
					  'puissance'=>'',
					]);*/
$e=$a->date_coup () + 3600;
$p = strtotime($a->date_connection());
echo $p;
echo 'Hello ' .$a->nom() . ' vous avez "' . $a->degat(). '" degats, "' . $a->experience() . '" d\'experience, niveau "' . $a->niveau() . '" et "' . $a->puissance () . '" en puissance derniére connexion à "'.$a->date_connection().'"<BR>';
echo 'temp = '.$e;
echo '<BR>'.$a->date_coup();
echo '<BR>'.$a->_f;
$z = $db->query('SELECT UNIX_TIMESTAMP (NOW())')->fetchColumn();
$u = $_SERVER['REQUEST_TIME'];
echo '<p>temp du serveur PHP: '.date('d/m/Y', $u).' &agrave; '.date('H:i:s', $u).'</p>';
echo '<p>'.$u.'</p>';
echo '<p>temp du serveur MYSQL: '.date('d/m/Y', $z).' &agrave; '.date('H:i:s', $z).'</p>';
echo '<p>'.$z.'</p>';
echo '<p>'.time ().'</p>';
$date = date('Y-m-d H:i:s', time());
echo '<p>'.$date.'</p>';
?>