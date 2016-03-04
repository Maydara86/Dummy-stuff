<?php
abstract class Characters
{
	protected $id,
			$nom,
			$degat,
			$experience,
			$niveau,
			$puissance,
			$coup,
			$date_coup,
			$date_connection,
			$time_endormi,
			$type,
			$atout;

	public  $_f,
			$_p;

	const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
	const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
	const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
	const PERSONNAGE_LIMIT = 4;
	const PERSONNAGE_ENDORMI = 5;
	const NO_MAGIC = 6;
	const LANCER_SORT = 7;

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function verifieCoup () // verifie si le dérnier coup est porté depuis plus de 2 minutes
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

	abstract function recevoirDegat ($puissance);
	/*{
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
	}*/

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
		return $this->id;
	}

	public function nom ()
	{
		return $this->nom;
	}

	public function degat ()
	{
		return $this->degat;
	}

	public function niveau ()
	{
		return $this->niveau;
	}

	public function experience ()
	{
		return $this->experience;
	}

	public function puissance ()
	{
		return $this->puissance;
	}

	public function coup ()
	{
		return $this->coup;
	}

	public function date_coup ()
	{
		return $this->date_coup;
	}

	public function date_connection ()
	{
		return $this->date_connection;
	}

	public function time_endormi ()
	{
		return $this->time_endormi;
	}

	public function type ()
	{
		return $this->type;
	}

	public function atout ()
	{
		return $this->atout;
	}

	// Setters

	public function setId ($id)
	{
		$id = (int) $id;
		if ($id > 0)
		{
			$this->id = $id;
		}
	}

	public function setNom ($nom)
	{
		if (is_string($nom))
		{
			$this->nom = $nom;
		}
	}

	public function setDegat ($degat)
	{
		$degat = (int) $degat;
		if ($degat >= 0)
		{
			$this->degat = $degat;
		}
		else
		{
			$this->degat = 0;
		}
	}

	public function setNiveau ($niveau)
	{
		$niveau = (int) $niveau;
		if ($niveau >= 1 && $niveau <= 99)
		{
			$this->niveau = $niveau;
		}
		else
		{
			$this->niveau = 100;
		}
	}

	public function setExperience ($experience)
	{
		if ($this->experience () <= 100)
		{
			$this->experience = $experience;
		}
	}

	public function setPuissance ()
	{
		$niveau = $this->niveau();
		switch ($niveau) {
			case ($niveau < 10):
				$this->puissance = 5;
				break;
			case ($niveau < 20):
				$this->puissance = 6;
				break;
			case ($niveau < 30):
				$this->puissance = 7;
				break;
			case ($niveau < 40):
				$this->puissance = 8;
				break;
			case ($niveau < 50):
				$this->puissance = 9;
				break;
			case ($niveau < 60):
				$this->puissance = 10;
				break;
			case ($niveau < 70):
				$this->puissance = 11;
				break;
			case ($niveau < 80):
				$this->puissance = 12;
				break;
			case ($niveau < 90):
				$this->puissance = 13;
				break;
			
			default:
				$this->puissance = 14;
				break;
		}
		//$this->puissance = 22;
	}

	public function setCoup ($coup)
	{
		$this->coup = $coup;
	}

	public function setDate_coup ($date_coup)
	{
		//$date_coup = (int) $date_coup;
		$this->date_coup = $date_coup;
	}

	public function setDate_connection ($date_connection)
	{
		$this->date_connection = $date_connection;
	}

	public function setAtout ()
	{
		if ($this->degat() <= 25)
		{
			$this->atout = 4;
		}
		if ($this->degat() >= 25 && $this->degat() <= 50)
		{
			$this->atout = 3;
		}
		if ($this->degat() >= 50 && $this->degat() <= 75)
		{
			$this->atout = 2;
		}
		if ($this->degat() >= 75 && $this->degat() < 100)
		{
			$this->atout = 1;
		}
	}

	public function setTime_endormi ($temp)
	{
		$this->time_endormi = $temp;
	}

	public function setType ($type)
	{
		$this->type = $type;
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
		return !empty($this->nom);
	}
}