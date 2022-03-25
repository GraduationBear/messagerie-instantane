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
<div id="chat">
    <form action="#">
        <div id="haut">
            <label for="auteur">Pseudo </label><input id="auteur" required>
        </div>
        <div id="discussion">
            Chargement...
        </div>
        <div id="bas">
            <label for="contenu">Message </label><input id="contenu" maxlength="500" placeholder="Entrez votre message...">
            <button id="send">Envoyer</button>
        </div>

    </form>

</div>


</body>

</html>


