<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat room</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="app.js"></script>

</head>
<body>

<h1>Connexion</h1>

<form method="post" action="afficher.php">
    <p>Identifiant <input name="identifiant"></p>
    <p>Mot de passe<input name="mdp"></p>
    <button name="connexion">
        Entrer !
    </button>
</form>

</body>

</html>

