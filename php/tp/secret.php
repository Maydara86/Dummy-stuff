<?php 
SESSION_start ();

$monfichier = fopen('compteur.txt', 'r+');
$nbrvue = fgets ($monfichier);
$nbrvue = $nbrvue++;
fseek($monfichier, 0);
fputs($monfichier, $nbrvue);
fclose($monfichier);
?>
<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>Formulaires</title>
   </head>
   <body>
		<p>My name is 
			<?php echo $_SESSION['pseudo']
		?>, I'm a <?php echo $_SESSION['class'] ?> and I love 
		<?php if (isset ($_COOKIE['preference']))
			{
				echo $_COOKIE['preference'] . ', ' . $nbrvue;
			}
			else
			{
				echo 'the COOKIE isn\'t set.';
			}

		 ?> 
	</p>	
	<p><form action="logout.php" method="post"> <input type="submit" value="Logout"> </form></p>
	<br />
	<img src="../Frozen.jpg" height="610" width="1240"/>
	
   </body>
</html>
