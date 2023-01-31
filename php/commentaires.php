<?php
require 'config.php';

// commande inutile car les champs doivent être obligatoirement remplis
// if (!empty($_SESSION["id"])) {
//   header("Location: index.php");
// }
if (isset($_POST["submit"]) != null) {
    $commentaire = $_POST["commentaire"];
    // $duplicate = mysqli_query($conn, "SELECT * FROM commentaires WHERE commentaire = '$commentaire'");

    // if (mysqli_num_rows($duplicate) > 0) {
    //     echo 'Login déjà pris <br>';
    // } 
    // else {
    //     if ($password == $confirmpassword) {
            $query = "INSERT INTO utilisateurs VALUES('','$commentaire')";
            mysqli_query($conn, $query);
            // header("Location: login.php");
            echo "Commentaire envoyé <br>";
    //     } else {
    //         echo "Les mots de passe ne correspondent pas. <br>";
    //     }
    // }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Commenter</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>

<body>
    <header>
        <nav>
            <?php require 'header_menu.php'; ?> 
        </nav>
    </header>

    <div class="container">
        <form class="" action="" method="post" autocomplete="off">
            <h2>Commentaire</h2>
            <br>

            <label for="login">Commentaire : </label>
            <input type="text" name="login" id="login" required value="" autofocus> <br>
            <!-- <textarea name="commentaire" rows="8" cols="35" required value="" autofocus> </textarea> <br /> -->
            <button type="submit" name="submit"><a href="">Envoyer</a></button>
        </form>
    </div>
    <br>

</body>

</html>