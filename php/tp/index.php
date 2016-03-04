<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<!DOCTYPE html>
<html>
   <head>
   		<meta charset='utf-8' />
       <title>Formulaires</title>
   </head>
   <body>
   		<?php
			if (!isset ( $_POST['pass']))
				{?>
					<p>
						Veuillez taper votre mot de passe (kangourou) pour acceder au serveur de la <strong>NASA</strong> :
					</p>
					
					<form action="index.php" method="post">
						<p>
							<input type="password" name="pass"/> <INPUT type="checkbox" name="box" value="1"> Rester Connecté
						</p>
						<p><input type="submit" value="Login" /></p>
					</form>
					<p><?php echo $_COOKIE['password']; ?></p>

				<?php }
			else
			{
				if ( $_POST['pass'] == 'kangourou')

						{
							// On s'amuse à créer quelques variables de session dans $_SESSION
							$_SESSION['pseudo'] = 'Vander';
							$_SESSION['class'] = 'Warrior';
							setcookie('preference', 'Games', time() + 365*24*3600, null, null, false, true);
							setcookie('password', $_POST['pass'], time() + 365*24*3600, null, null, false, true);
							echo  ('<p>Bienvenue aux serveurs de la <a href="secret.php">NASA</a> ' . $_SESSION['pseudo'] . ' we Know that you love ' . $_COOKIE['preference'] . '</p> <img src="/php/Frozen.jpg" height="610" width="1240"/>');
						}
						else 
						{
							echo  ("<p>Désolé votre mot de pass est incorrect '" . htmlspecialchars ($_POST['pass']) . "'</p>");
						}
			}

		?>
		
   </body>
</html>