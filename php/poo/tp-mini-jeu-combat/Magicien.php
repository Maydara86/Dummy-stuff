<?php
require 'Personnage.php';
class Magicien extends Personnage
{
	public function recevoirDegat ()
	{
		$degat = $this->degat() + 5;
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

	public function lancerSort ($perso)
	{
		if ($perso->id() == $this->id())
		{
			return self::CEST_MOI;
		}
		$temp = time() + 86400;
		$perso->setTimeEndormi ($temp);
	}

	public static function a ()
	{
		echo 't. A. T. u.'
	}
}
?>