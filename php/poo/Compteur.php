<?php
class Compteur
{
	private static $compteur = 0;
	public function __construct ()
	{
		self::$compteur++;
	}
	public static function getCompteur ()
	{
		echo 'Vous avez instanicer la classe Compteur ' . self::$compteur . ' fois';
	}
}