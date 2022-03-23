<?php

require 'db.php';

$auteur=addslashes(htmlspecialchars($_GET['auteur']));
$content=addslashes(htmlspecialchars($_GET['contenu']));

date_default_timezone_set('Europe/Paris');
$date = date('d-m-y H:i:s');

if(!($auteur=="") && !($content=="")){
    //création de la requête pour insérer un message dans "chat"
    $requete='INSERT INTO chat (horaire, auteur, content)
VALUES (\''.$date.'\',\''.$auteur.'\', \''.$content.'\')';


    try {
        $linkpdo->query($requete);
    }catch(Exception $e){

        die('error : ' . $e->getMessage());
    }
}



