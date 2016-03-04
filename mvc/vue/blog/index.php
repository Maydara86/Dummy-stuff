<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="vue/blog/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <h2>Derniers billets du blog :</h2>
 
<?php
foreach($billets as $billet)
{
?>
<div class="news">
    <h3>
        <?php echo $billet['titre']; ?>
        <em>le <?php echo $billet['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php echo $billet['contenu']; ?>
    <br />
    <em><a href="commentaires.php?billet="<?php echo $billet['id']; ?>>Commentaires</a></em>
    </p>
    
</div>
<?php
}
for ($i = 1; $i <= $nPage; $i++)
{
    echo '<a href=\'controleur/blog/index.php?p='.$i.'\'> '.$i.'</a> /';
}
//include_once('controleur/blog/index.php');
?>
</body>
</html>