<?php
session_start();
require 'db.php';

$auteur=addslashes(htmlspecialchars($_GET['auteur']));
$content=addslashes(htmlspecialchars($_GET['contenu']));

date_default_timezone_set('Europe/Paris');
$date = date('d-m-y H:i:s');

$salle=$_COOKIE['salle'];
echo $salle;

if(!($auteur=="") && !($content=="")){
    //création de la requête pour insérer un message dans "chat"
    $requete='INSERT INTO chat (horaire, auteur, content, salle)
VALUES (\''.$date.'\',\''.$auteur.'\', \''.$content.'\', \''.$salle.'\')';


    try {
        /** @var $linkpdo */
        $linkpdo->query($requete);
    }catch(Exception $e){

        die('error : ' . $e->getMessage());
    }
}



