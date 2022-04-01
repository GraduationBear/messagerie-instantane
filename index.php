<?php
    session_start();
    require 'db.php';
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
<div id="connexion">
    <h1 id="Titre">Connexion</h1>
    <div id="formco">
        <form method="post">
            <div id="champs">
                <label>Identifiant <input name="identifiant" type="text" required></label>
                <label>Mot de passe<input name="mdp" type="password" required></label>
                <button name="connexion">
                    Entrer !
                </button>
            </div>

        </form>
    </div>
</div>
<div id="connexion">
    <h1 id="Titre">Inscription</h1>
    <div id="formco">
        <form method="post">
            <div id="champs">
                <label>Identifiant
                        <input name="idinscription" type="text" required>
                    </label>
                <label>Mot de passe
                        <input name="mdpinscription" type="password" required>
                    </label>
                <label>Confirmer le mot de passe
                        <input name="xd" type="password" required>
                    </label>
                <button name="inscription">
                    S'inscrire !
                </button>
            </div>

        </form>
    </div>
</div>
<h2>ATTENTION : LES MOTS DE PASSES NE SONT PAS SECURISES, CE SITE EST UNIQUEMENT A BUT PEDAGOGIQUE</h2>

</body>

<?php
if(isset($_POST['connexion'])){

    $req='SELECT pseudo, motdepasse FROM user';
    try {
        /** @var $linkpdo */
        $result=$linkpdo->query($req);

    }catch (Exception $e){
        die($e->getMessage());
    }

    while($data=$result->fetch()) {
        if($_POST['identifiant']==$data['pseudo'] && $_POST['mdp']==$data['motdepasse']){
            $_SESSION['pseudo']=$data['pseudo'];
            header('Location: afficher.php');
            exit();
        }

    }
    echo '<div id="error"><p>Pseudo ou mot de passe incorrect</p></div>';

}
if(isset($_POST['inscription'])){
    if($_POST['mdpinscription']!=$_POST['xd']){
        echo '<div id="error"><p>les mots de passes ne correspondent pas</p></div>';
    }else{
        $id=$_POST['idinscription'];
        $mdp=$_POST['mdpinscription'];


        $req='SELECT pseudo, motdepasse FROM user';
        $boolean=true;
        try {
            /** @var $linkpdo */
            $result=$linkpdo->query($req);

        }catch (Exception $e){
            die($e->getMessage());
        }
        while($data=$result->fetch()) {
            if($id==$data['pseudo']){
                $boolean=false;
            }
        }

        if($boolean==true){
            $req='INSERT INTO user(pseudo,motdepasse) VALUES (\''.$id.'\',\''.$mdp.'\')';
            try {
                /** @var $linkpdo */
                $result=$linkpdo->query($req);

            }catch (Exception $e){
                die($e->getMessage());
            }
            echo '<div id="error"><p>Inscription réussie, vous pouvez vos connecter</p></div>';
        }else{
            echo '<div id="error"><p>Nom d\'utilisateur déjà utilisé</p></div>';
        }

    }

}
?>
</html>

