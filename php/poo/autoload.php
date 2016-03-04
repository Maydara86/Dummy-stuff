<?php
function chargerClass ($class)
{
	require $class . '.php';
}
spl_autoload_register('chargerClass');