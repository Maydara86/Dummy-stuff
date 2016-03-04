<!DOCTYPE html>
<html>
   <head>
   	<meta charset='utf-8' />
       <title>Minichat</title>
   </head>
   <body>
   	<form action="minichat_post.php" method="post">
   		<?php echo'<p>Pseudo: <input type="text" name="pseudo" value="' . $_COOKIE['pseudo'] . '"/></p>'?>
   		<p>Message: <input type="text" name="message"/></p>
   		<p><input type="submit" value="Valider" /></p>
   	</form>
      
      <!--bouton pour rafraichir la page-->
      <input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>

      <br /><br /><br /><br />
      <?php
         try
         {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         }
         catch (Exception $e)
         {
                 die('Erreur : ' . $e->getMessage());
         }
         $request = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0,10');
         //LIMIT position du début, nombre a tronquer, DESC commence par la fin, ASC commence par le début.
         while ($donnees = $request->fetch())
         {
            $format = '<p><strong>%s:</strong>  %s</p>';
            echo sprintf ($format,htmlspecialchars($donnees['pseudo']),htmlspecialchars($donnees['message']));
         }

         //Pour Afficher les 10 permieres entrées il faut passer "p=1" dans l'URL

         if (isset($_GET) && !empty($_GET))
         {
            echo "<p>______________________________________________________</p>";
            switch ($_GET['p']):
                    case 1:
                        $request = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id ASC LIMIT 0,10');
                                 //LIMIT position du début, nombre a tronquer, DESC commence par la fin, ASC commence par le début.
                              while ($donnees = $request->fetch())
                                 {
                                    $format = '<p><strong>%s:</strong>  %s</p>';
                                    echo sprintf ($format,htmlspecialchars($donnees['pseudo']),htmlspecialchars($donnees['message']));
                                 }
                        break;
                    case 2:
                        $request = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id ASC LIMIT 10,10');
                                 //LIMIT position du début, nombre a tronquer, DESC commence par la fin, ASC commence par le début.
                                 while ($donnees = $request->fetch())
                                 {
                                    $format = '<p><strong>%s:</strong>  %s</p>';
                                    echo sprintf ($format,htmlspecialchars($donnees['pseudo']),htmlspecialchars($donnees['message']));
                                 }
                        break;
                    case 3:
                        $request = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id ASC LIMIT 20,10');
                                 //LIMIT position du début, nombre a tronquer, DESC commence par la fin, ASC commence par le début.
                                 while ($donnees = $request->fetch())
                                 {
                                    $format = '<p><strong>%s:</strong>  %s</p>';
                                    echo sprintf ($format,htmlspecialchars($donnees['pseudo']),htmlspecialchars($donnees['message']));
                                 }
                        break;
                    default:
                        $request = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0,10');
                                 //LIMIT position du début, nombre a tronquer, DESC commence par la fin, ASC commence par le début.
                                 while ($donnees = $request->fetch())
                                 {
                                    $format = '<p><strong>%s:</strong>  %s</p>';
                                    echo sprintf ($format,htmlspecialchars($donnees['pseudo']),htmlspecialchars($donnees['message']));
                                 }
            endswitch;
         }
         $request->closeCursor();
      ?>
   </body>
</html>