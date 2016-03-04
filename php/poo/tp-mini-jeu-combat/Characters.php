<?php
class Characters
{
	private $_id,
			$_nom,
			$_degat,
			$_experience,
			$_niveau,
			$_puissance,
			$_coup,
			$_date_coup,
			$_date_connection;
	public  $_f,
			$_p;

	const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
	const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
	const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
	const PERSONNAGE_LIMIT = 4;
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function verifieCoup ()
	{
		$t = $this->date_coup() + 120;
		if ($t < $_SERVER['REQUEST_TIME'])
		{
			$this->setCoup(0);
			$this->_f = $t;
			$this->_p = $_SERVER['REQUEST_TIME'];
		}
	}

	public function frapper (Characters $perso)
	{
		if ($perso->id() == $this->id())
		{
			return self::CEST_MOI;
		}
		$this->verifieCoup();
		if ($this->coup() < 3)
		{
			$this->gagnerExperience ();
			$coup = $this->coup() +1;
			$this->setCoup($coup);
			return $perso->recevoirDegat($this->puissance());
		}
		else 
		{
			return self::PERSONNAGE_LIMIT;
		}
	}

	public function recevoirDegat ($puissance)
	{
		$degat = $this->degat() + $puissance;
		$this->setDegat($degat);
		if($this->degat() >= 100)
		{
			return self::PERSONNAGE_TUE;
		}
		else
		{
			return self::PERSONNAGE_FRAPPE;
		}
	}

	public function gagnerExperience ()
	{
		$experience = $this->experience ();
		if ($experience <= 100)
		{
			$experience = $experience + 50;
			$this->setExperience ($experience);
		}
		if ($experience == 100)
		{
			$experience = 0;
			$this->setExperience (0);
			$this->levelup ();
		}
	}
	
	// Getters

	public function id ()
	{
		return $this->_id;
	}

	public function nom ()
	{
		return $this->_nom;
	}

	public function degat ()
	{
		return $this->_degat;
	}

	public function niveau ()
	{
		return $this->_niveau;
	}

	public function experience ()
	{
		return $this->_experience;
	}

	public function puissance ()
	{
		return $this->_puissance;
	}

	public function coup ()
	{
		return $this->_coup;
	}

	public function date_coup ()
	{
		return $this->_date_coup;
	}

	public function date_connection ()
	{
		return $this->_date_connection;
	}

	// Setters

	public function setId ($id)
	{
		$id = (int) $id;
		if ($id > 0)
		{
			$this->_id = $id;
		}
	}

	public function setNom ($nom)
	{
		if (is_string($nom))
		{
			$this->_nom = $nom;
		}
	}

	public function setDegat ($degat)
	{
		$degat = (int) $degat;
		if ($degat >= 0)
		{
			$this->_degat = $degat;
		}
		else
		{
			$this->_degat = 0;
		}
	}

	public function setNiveau ($niveau)
	{
		$niveau = (int) $niveau;
		if ($niveau >= 1 && $niveau <= 99)
		{
			$this->_niveau = $niveau;
		}
		else
		{
			$this->_niveau = 100;
		}
	}

	public function setExperience ($experience)
	{
		if ($this->experience () <= 100)
		{
			$this->_experience = $experience;
		}
	}

	public function setPuissance ()
	{
		$niveau = $this->niveau();
		switch ($niveau) {
			case ($niveau < 10):
				$this->_puissance = 1;
				break;
			case ($niveau < 20):
				$this->_puissance = 2;
				break;
			case ($niveau < 30):
				$this->_puissance = 3;
				break;
			case ($niveau < 40):
				$this->_puissance = 4;
				break;
			case ($niveau < 50):
				$this->_puissance = 5;
				break;
			case ($niveau < 60):
				$this->_puissance = 6;
				break;
			case ($niveau < 70):
				$this->_puissance = 7;
				break;
			case ($niveau < 80):
				$this->_puissance = 8;
				break;
			case ($niveau < 90):
				$this->_puissance = 9;
				break;
			
			default:
				$this->_puissance = 10;
				break;
		}
		//$this->_puissance = 22;
	}

	public function setCoup ($coup)
	{
		$this->_coup = $coup;
	}

	public function setDate_coup ($date_coup)
	{
		//$date_coup = (int) $date_coup;
		$this->_date_coup = $date_coup;
	}

	public function setDate_connection ($date_connection)
	{
		$this->_date_connection = $date_connection;
	}

	public function levelup ()
	{
		$niveau = $this->niveau();
		$niveau++;
		$this->setNiveau($niveau);
		$this->setPuissance();
	}

	public function hydrate (array $donnees)
	{
		foreach ($donnees as $key => $value) 
		{
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method ($value);
			}
		}
	}
	// cette fonction verifie si on entrée un nom pour cet objet ou pas le résultat sera boolean
	public function nomValide()
	{
		return !empty($this->_nom);
	}
}