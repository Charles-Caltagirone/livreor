<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Commentaire</title>
</head>

<body>
    <header>
        <nav>
            <?php require 'header_menu.php'; ?>
        </nav>
    </header>

    <form method="post" action="">
        <h2>Laisser un commentaire</h2>
        Message :<br />
        <textarea name="commentaire" rows="8" cols="35" autofocus> </textarea> <br />
        <!-- <button type="submit" name="submit"><a href="livreor.php">Publier</a></button> -->
        <button type="submit" value="Envoyer">Publier</button>
    </form>

</body>

</html>

<?php
// var_dump($_SESSION);

if ($_SESSION['user'][0]['login'] != 'login') {
    header("Location: ../index.php");
}

if (isset($_POST['commentaire']))

    if (empty($_POST['commentaire'])) // si le commentaire n'est pas vide  

    {
        echo 'remplir';
    } else {
        /* On utilise htmlentities pour empecher les gens d'inserer du html,  
        tout code html sera affiché en tant que code html, il ne sera pas interpreté. 
        et ent_quotes pour convertir les guillemets doubles et les guillemets simples: 
        il faut noter que c'est pour des raisons de securité qu'on a fait ainsi */

        $id_user = $_SESSION['user'][0]['id'];
        $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);
        $commentaire = nl2br($commentaire); // nl2br insère un retour à la ligne HTML à chaque nouvelle ligne  
        $date = date("Y/m/d H:i:s"); //cette fonction permet de savoir la date de l'envoi de commentaire 
        // $request = $conn->query("INSERT INTO commentaires (commentaire, date) VALUES('$commentaire', '$date')");

        mysqli_query($conn, "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES('$commentaire','$id_user', '$date')");

        // exemple du projet module-connexion
        // $query = "INSERT INTO commentaires VALUES('','$commentaire','$date')";
        // mysqli_query($conn, $query);
        header("Location: livreor.php");
    }

?>