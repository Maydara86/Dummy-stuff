<?php
abstract class Personnage
{
	protected $id,
			  $nom,
			  $degats,
			  $timeEndormi,
			  $type,
			  $atout;

	const CEST_MOI = 1;
	const PERSONNAGE_ENDORMI = 2;
	const PERSONNAGE_FRAPPE = 3;
	const PERSONNAGE_MORT = 4;

	public function frapper ($perso)
	{
		if ($perso->id() == $this->id())
			{
				return self::CEST_MOI;
			}
		return $perso->recevoirDegat();
	}

	abstract public function recevoirDegat ();

	//Getters

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

	public function timeEndormi ()
	{
		return $this->timeEndormi;
	}

	public function type ()
	{
		return $this->type;
	}

	public function atout ()
	{
		return $this->atout;
	}
	
	//Setters

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
		$this->degat = $degat;
	}

	public function setTimeEndormi ($temp)
	{
		$temp = (int) $temp;
		$this->timeEndormi = $temp;
	}

	public function setType ($type)
	{
			$this->type = $type;
	}
	public function setAtout ($atout)
	{
		$this->atout = $atout;
	}

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
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
}