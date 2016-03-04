<?php      
       class Person 
        {
          public $isAlive = true;
          
          function __construct($name) 
          {
              $this->name = $name;
          }
          
          public function dance() 
          {
            return "Je danse !";
          }
        }
        
        $me = new Person("Marc");
        if (is_a($me, "Person")) // "is_a" permet de savoir si un objet particulier est une instance d'une classe donnée 
        {
          echo "Je suis une personne, ";
        }
        if (property_exists($me, "name")) // "property_exists" permet de savoir si un objet possède une propriété donnée
        {
          echo "J'ai un nom, ";
        }
        if (method_exists($me, "dance")) // "method_exists" permet de savoir si un objet possède une méthode donnée
        {
          echo "et je sais comment danser !";
        }
