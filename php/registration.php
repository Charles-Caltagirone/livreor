<?php
require 'config.php';

// commande inutile car les champs doivent être obligatoirement remplis
// if (!empty($_SESSION["id"])) {
//   header("Location: index.php");
// }
if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE login = '$login'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo 'Login déjà pris <br>';
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO utilisateurs VALUES('','$login','$password')";
            mysqli_query($conn, $query);
            header("Location: login.php");
            // echo "Inscription Réussie <br>";
        } else {
            echo "Les mots de passe ne correspondent pas. <br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>S'enregistrer</title>
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
            <h2>Inscription</h2>
            <br>

            <label for="login">Login : </label>
            <input type="text" name="login" id="login" required value="" autofocus> <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required value=""> <br>
            <label for="confirmpassword">Confirm Password : </label>
            <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
            <button type="submit" name="submit">Valider</button>
            <button type="submit" name="submit"><a href="login.php">Déjà inscrit ? Connecte toi ici !</a></button>
        </form>
    </div>
    <br>

</body>

</html>