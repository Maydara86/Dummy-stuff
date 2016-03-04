<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>formulaires d'insertion dans la base de données</title>
   </head>
   <body>
   	<form action="bd-insert.php" method="post">
   		<p>nom: <input type="text" name="nom"/></p>
   		<p>possesseur: <input type="text" name="possesseur"/></p>
   		<p>console: <input type="text" name="console"/></p>
   		<p>prix: <input type="text" name="prix"/></p>
   		<p>nombre de joueurs: <input type="text" name="nbr"/></p>
   		<p>commentaires: <input type="text" name="commentaires"/></p>
   		<p><input type="submit" value="Valider" /></p>
   	</form>
   </body>
</html>