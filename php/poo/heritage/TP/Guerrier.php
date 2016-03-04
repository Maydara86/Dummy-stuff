<?php
require 'Personnage.php';
class Guerrier extends Personnage
{
	public function recevoirDegat ()
	{
		$degat = ($this->degat() + 5) - $this->atout();
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
}
?>