<?php
function recuperer_news()
{
        $news = array();
 
        $req = $db->query("SELECT id, auteur, titre, DATE_FORMAT(date, '%d/%m/%Y %H') AS date_formatee, contenu 
        FROM news
        ORDER BY date DESC");
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
                $news[] = $data;
        }
 
        return $news;
}
