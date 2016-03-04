<html>
  <head>
    <link rel="stylesheet" href="stylesheet.css" />
    <title>Langages de Codecademy</title>
  </head>
  <body>
    <h1>Les langages de programmation de Codecademy :</h1>
    <div class="wrapper">
      
        <?php
          $langs = array("JavaScript",
          "HTML/CSS", "PHP",
          "Python", "Ruby");
        
          foreach ($langs as $i => $lang) {
              echo "$i: $lang<br />";
          }
        
          unset($lang);
        ?>
      
    </div>
  </body>
</html>