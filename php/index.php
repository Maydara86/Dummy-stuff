
<!DOCTYPE html>
<html>
   <head>
   		<meta charset='utf-8' />
       <title>Formulaires</title>
   </head>
   <body>
		<p>
			Cette page ne contient que du HTML.<br />
			Veuillez taper votre prénom :
		</p>
		
		<form action="c.php" method="post">
			<p>
				<input type="text" name="prenom" value="Vander"/> <input type="submit" value="Valider" />
			</p>
			<input name="message" type="hidden" value="I love video games, movies and TV shows." />
			
			
			<p>
			<select name="choix">
			    <option value="choix1">Choix 1</option>
			    <option value="player" selected="selected">Player</option>
			    <option value="choix3">Choix 3</option>
			    <option value="choix4">Choix 4</option>
			</select>
		</p>
		</form>
   </body>
</html>
