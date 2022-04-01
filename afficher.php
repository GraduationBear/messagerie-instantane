<?php
    session_start();
    setcookie('pseudo', $_SESSION['pseudo']);
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
<nav id="navbar">

    <ul id="links">
        <li><a id="Manga">Manga</a></li>
        <li><a id="Informatique">Informatique</a></li>
        <li><a id="Politique">Politique</a></li>
        <li><a id="Détente">Détente</a></li>
        <li><button onclick="window.location.href = 'logout.php'">Déconnexion</button></li>
    </ul>
</nav>



<div id="container">
    <div id="info">
        <?php
            echo '<p>Bonjour '.$_SESSION['pseudo'].' !<br>';

        ?>
    </div>
    <div id="chat">

            <div id="discussion">
                Chargement...
            </div>
            <div id="bas">
                <label for="contenu">Message</label><input id="contenu" maxlength="500" placeholder="Entrez votre message...">
                <button id="send">Envoyer</button>
            </div>
    </div>

</div>

</body>

</html>


