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
    <div class="container">

        <form method="post" action="">
            <h2>Laisser un commentaire</h2>
            Message :<br />
            <textarea name="commentaire" rows="8" cols="35" autofocus> </textarea> <br />
            <!-- <button type="submit" name="submit"><a href="livreor.php">Publier</a></button> -->
            <?php
            // var_dump($_SESSION);

            if (!$_SESSION['user'][0]['login']) {
                header("Location: ../index.php");
            }

            if (isset($_POST['submit']))
                $id_user = $_SESSION['user'][0]['id'];
            $date = date("Y/m/d H:i:s"); //cette fonction permet de savoir la date de l'envoi de commentaire 
            $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);
            $commentaire = nl2br($commentaire); // nl2br insère un retour à la ligne HTML à chaque nouvelle ligne  

            if (!empty($commentaire)) // si le commentaire est vide  

            {
                mysqli_query($conn, "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES('$commentaire','$id_user', '$date')");

                header("Location: livreor.php");
            } else {
                echo 'remplir';
            }

            ?>
            <button name='submit' type="submit" value="Envoyer">Publier</button>
        </form>
    </div>
</body>

</html>