<?php
class Personnage
{
  private $_id;
  private $_nom;
  private $_forcePerso;
  private $_degats;
  private $_niveau;
  private $_experience;

  public function __construct($donnees)
  {
  	$this->hydrate($donnees);
  }

  //la fonction hydrate qui assigne les valeurs aux attributs

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
          
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  //fonction qui affiche tout les getters

  public function affichePerso ()
  {
  	echo $this->id() . ' - ' . $this->nom() . ' a ', $this->forcePerso() . ' de force, ' . $this->degats() . ' de dégâts, ' . $this->experience() . ' d\'expérience et est au niveau ' . $this->niveau();
  }
  
  // Liste des getters
  
  public function id()
  {
    return $this->_id;
  }
  
  public function nom()
  {
    return $this->_nom;
  }
  
  public function forcePerso()
  {
    return $this->_forcePerso;
  }
  
  public function degats()
  {
    return $this->_degats;
  }
  
  public function niveau()
  {
    return $this->_niveau;
  }
  
  public function experience()
  {
    return $this->_experience;
  }
  
  // Liste des setters
  
  public function setId($id)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $id = (int) $id;
    
    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($id > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this->_id = $id;
    }
  }
  
  public function setNom($nom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }
  
  public function setForcePerso($forcePerso)
  {
    $forcePerso = (int) $forcePerso;
    
    if ($forcePerso >= 1 && $forcePerso <= 100)
    {
      $this->_forcePerso = $forcePerso;
    }
  }
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }
  
  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
    
    if ($niveau >= 1 && $niveau <= 100)
    {
      $this->_niveau = $niveau;
    }
  }
  
  public function setExperience($experience)
  {
    $experience = (int) $experience;
    
    if ($experience >= 0 && $experience <= 100)
    {
      $this->_experience = $experience;
    }
  }
}
?>