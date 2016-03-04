<?php
/**
* class guerrier
*/
class Guerrier extends Characters
{
	/*public function frapper (Characters $perso)
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
	}*/

	public function recevoirDegat ($puissance)
	{
		$degat = $this->degat() + $puissance - $this->atout();
		$this->setDegat($degat);
		if($this->degat() >= 100)
		{
			return self::PERSONNAGE_TUE;
		}
		else
		{
			$this->setAtout();
			return self::PERSONNAGE_FRAPPE;
		}
	}	
}