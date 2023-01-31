<?php
require('config.php');

if (isset($_POST['submit'])) {

    $mess_pw = ""; //variable message password manquant
    $error_pw = ""; //variable message password error
    $modif_succes = "";
    // $new_login = $_POST['new_login'];
    // $prenom = $_POST['prenom']; // variable stockage
    // $password = $_POST['password'];
    // $nom = $_POST['nom'];
    // $login = $_SESSION['login'];
    $id = $_SESSION['user'][0]['id'];
    $login = $_SESSION['user'][0]['login'];
    $password = $_SESSION['user'][0]['password'];



    if (empty($_POST['login']) || empty($_POST['old_password']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $mess_pw = "Renseignez tous les champs";
    } elseif ($_POST['password'] != $_POST['password2']) {
        $error_pw = "Veuillez rentrez le même mot de passe";
    } elseif (($_POST['password'] === $_POST['password2']) && !empty($_POST['old_password'])) {

        // $sql = $conn->query("UPDATE utilisateurs SET login ='" . $login . "', prenom ='" . $prenom . "', nom ='" . $nom . "' WHERE id='" . $id . "'");

        $query = "UPDATE utilisateurs SET login ='" . $login . "', password ='" . $password . "' WHERE id='" . $id . "'";
        mysqli_query($conn, $query);


        echo "Votre profil a été mise à jour avec succès";
        echo "<br>";
        $_SESSION['user'][0]['login'] = $_POST['login'];
        $_SESSION['user'][0]['password'] = $_POST['password'];
    }
}

?>


<div class="container_session">
    <?php if ($_SESSION['user'][0]['login']) { ?>
</div>


<!DOCTYPE html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&family=Roboto+Flex:opsz,wght@8..144,600&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <header>
        <nav>
            <?php require 'header_menu.php'; ?>
        </nav>
    </header>

    <div class="container">

        <form action="" method="POST" autocomplete="on">
            <h2>Modifier son profil</h2>
            <br>

            <label for="login">LOGIN</label><br>

            <input type="text" name="login" value="<?= $_SESSION['user'][0]['login'] ?>"><br>

            <label for="mtp">Ancien mot de passe</label> <br>
            <input type="password" name="old_password" value="<?= $_SESSION['user'][0]['password'] ?>"><br>

            <label for="mtp">Nouveau mot de passe</label> <br>
            <input type="password" name="password" placeholder="Nouveau mot de passe"> <br>

            <label for="confirm">CONFIRMATION DE MOT PASSE</label><br>
            <input type="password" name="password2" placeholder="Confirmez le nouveau mdp"> <br>

            <?php if (isset($error_pass)) { ?>
                <span>
                    <p><?= $error_pass ?></p>
                </span>
            <?php } ?>
            <br>
            <br>
            <br>

            <?= @$mess_pw ?>
            <?= @$error_pw ?>
            <br>
            <br>
            <button type="submit" name="submit">Sauvegarder</button>

        </form>
    </div>
<?php }
    // var_dump($_SESSION);
?>


</body>

</html>