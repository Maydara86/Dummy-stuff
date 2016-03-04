<?php
// On démarre la session
session_start ();

if (isset ($_GET))
{
// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();
setcookie('preference', '', time() - 365*24*3600, null, null, false, true);
setcookie('password', '', time() - 365*24*3600, null, null, false, true);

// On redirige le visiteur vers la page d'accueil
header ("location: /php/tp/index.php");
}
?>