<?php

$server="localhost";
$db="messagerie-instantane";
$login="root";
$mdp="root";


try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
}
catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());

}
