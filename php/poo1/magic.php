<?php
class MaClasse
{
    public $attributes;
    public function __construct(array $proprietes) {
        $this->attributes = $proprietes;
    }
    public function __get($key)    {
        return $this->attributes[$key];
    }
    public function __set($key, $value)    {
        $this->attributes[$key] = $value;
    }
}
$mon_volume = new MaClasse(array('forme' => 'cercle', 'materiau' => 'bois', 'poids' => 30));
$mon_volume->couleur = 'bleu';
//echo $mon_volume->forme,'<br>',$mon_volume->materiau,'<br>',$mon_volume->poids,'<br>',$mon_volume->couleur;
print_r ($mon_volume->attributes);
//var_dump($mon_volume->attributes);