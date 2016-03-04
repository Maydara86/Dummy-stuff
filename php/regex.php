<?php
if (preg_match("#(boris)?#", "aime jouer de la guitare.")) // le symbole ? indique que la lettre ou le mot rechercher est facultatif il peut y etre présent ou pas c'est la même chose
{
    echo 'VRAI';
}
else
{
    echo 'FAUX';
}
//#[^0-9]# : Le chapeau à l'intérieur d'une classe (les classe sont toujours entre des crochets) veut dire priver de 0-9 contrairenment au chapeau au début d'un regex qui veut dire qu'il dois commencer par ...
?>