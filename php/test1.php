<?php
/*
session_start();


class Connexion
{
  protected $pdo, $serveur, $utilisateur, $motDePasse, $dataBase;
  
  public function __construct($serveur, $utilisateur, $motDePasse, $dataBase)
  {
    $this->serveur = $serveur;
    $this->utilisateur = $utilisateur;
    $this->motDePasse = $motDePasse;
    $this->dataBase = $dataBase;
    
    $this->connexionBDD();
  }
  
  protected function connexionBDD()
  {
    $this->pdo = new PDO('mysql:host='.$this->serveur.';dbname='.$this->dataBase, $this->utilisateur, $this->motDePasse);
  }
  
  public function __sleep()
  {
    return ['serveur', 'utilisateur', 'motDePasse', 'dataBase'];
  }
  
  public function __wakeup()
  {
    $this->connexionBDD();
  }
}

if (!isset($_SESSION['connexion']))
{
  $connexion = new Connexion('localhost', 'root', '', 'test');
  $_SESSION['connexion'] = $connexion;
  
  echo 'Actualisez la page !';
}

else
{
  echo '<pre>';
  var_dump($_SESSION['connexion']); // On affiche les infos concernant notre objet.
  echo '</pre>';
}
*/

/*
class FileReader
{
    protected $f;

	public function __construct($path)
	{
		$this->f = fopen($path, 'c+');
	}

	public function __debugInfo()
	{
		return ['f' => fstat($this->f)];
	}
}

$f = new FileReader('fichier.txt');
var_dump($f); // Affiche les informations retournées par fstat.
*/
class A 
{
	public $_e;
}
$a = new A;
$a->_e = 1;
/*
$b = $a;
$b->_e = 10;
*/
$b = clone $a;
$b->_e = 10;
echo '<p>'. $a->_e .' </p>';
echo '<p>'. $b->_e .' </p>';

