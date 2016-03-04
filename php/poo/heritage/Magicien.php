<?php
class Magicien extends Characters
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
		$degat = $this->degat() + $puissance;
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

	public function lancerSort ($perso)
	{
		if ($perso->id() == $this->id())
		{
			return self::CEST_MOI;
		}
		if ($this->atout() == 0)
		{
			return self::NO_MAGIC;
		}
		$atout = $this->atout();
		switch ($atout) {
			case ($atout == 4):
				$temp = time() + 480;
				break;
			case ($atout == 3):
				$temp = time() + 360;
				break;
			case ($atout == 2):
				$temp = time() + 240;
				break;
			
			default:
				$temp = time() + 120;
				break;
		}
		$perso->setTime_endormi ($temp);
		return self::LANCER_SORT;
	}
}
