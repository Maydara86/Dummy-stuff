<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>Formulaires</title>
   </head>
   <body>
		<p>My name is  
			<?php 
			if (isset ($_POST['prenom']) && isset ($_POST['message']) && isset ($_POST['choix']))
			{
				echo ( $_POST['prenom'] . '! ' . $_POST['message'] . ' because I\'m a ' . $_POST['choix']);
			};
		?>
	</p>	
	<br />
	<img src="Frozen.jpg" height="610" width="1240"/>
	</body>
</html>
