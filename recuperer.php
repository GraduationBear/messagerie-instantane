<?php

require 'db.php';

if(!isset($_GET['salle']) and isset($_COOKIE['salle'])){
    $salle=$_COOKIE['salle'];
}elseif(!isset($_GET['salle']) and !isset($_COOKIE['salle'])){
    setcookie('salle', 'Manga');
    $salle=$_COOKIE['salle'];
}elseif(isset($_GET['salle']) and isset($_COOKIE['salle'])){
    setcookie('salle', $_GET['salle']);
    $salle=$_COOKIE['salle'];
}



$requete2='SELECT horaire,auteur,content FROM (
   SELECT horaire,auteur,content FROM chat WHERE salle=\''.$salle.'\' ORDER BY horaire DESC LIMIT 10
)Var1
   ORDER BY horaire ASC';


//Requête permettant de récupèrer les 10 derniers messages
//$requete2='SELECT horaire, auteur,content FROM (SELECT horaire, auteur,content FROM chat ORDER BY horaire DESC LIMIT 10)Var1
//ORDER BY horaire ASC';
//WHERE salle=\''.$_COOKIE['salle'].'\'
try {
    /** @var $linkpdo */
    $result=$linkpdo->query($requete2);

}catch (Exception $e){
    die($e->getMessage());
}


date_default_timezone_set('Europe/Paris');
$date = date('d-m-y H:i:s');
$atm=strtotime($date);

while($data=$result->fetch()){

  
    $datem=strtotime($data['horaire']);
    $diff=$atm-$datem;


    $years = floor($diff / (365*60*60*24));


    $months = floor(($diff - $years * 365*60*60*24)
        / (30*60*60*24));

    $days = floor(($diff - $years * 365*60*60*24 -
            $months*30*60*60*24)/ (60*60*24));


    $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
        / (60*60));



    $minutes = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24
            - $hours*60*60)/ 60);


    $seconds = floor(($diff - $years * 365*60*60*24
        - $months*30*60*60*24 - $days*60*60*24
        - $hours*60*60 - $minutes*60));


    if(!$data['auteur']=="" && !$data['content']==""){

        echo '<div class="boxchat">';

        if ($seconds<60 && $minutes==0){
            echo '<span id="since">il y a '.$seconds.' s  </span>';
        }elseif ($minutes<60 && $hours==0){
            echo '<span id="since">il y a '.$minutes.' min </span>';
        }elseif ($hours<24){
            echo '<span id="since">il y a '.$hours.' h </span>';
        }

        echo '<span id="pseudo">'.$data['auteur'].'</span>
        <span id="message">'.$data['content'].'</span>
    </div>';
    }


}
