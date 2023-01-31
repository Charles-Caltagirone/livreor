<?php
require 'config.php';

// commande inutile car les champs doivent être obligatoirement remplis
// if (!empty($_SESSION["id"])) {
//   header("Location: index.php");
// }

if (isset($_POST["submit"])) {
  $login = $_POST["login"];
  $password = $_POST["password"];
  $requete = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE login = '$login'");
  $result = $requete->fetch_all(MYSQLI_ASSOC);
  $_SESSION['user'] = $result;
  // $result2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $rowcount = mysqli_num_rows($requete);
  // echo ($rowcount);


  if ($rowcount > 0) {
    // echo ($result2[0]['password']);
    if ($result[0]['password'] == $password) {
      // $_SESSION['login'] = $result[0]['login'];
      // var_dump($_SESSION);
      header("Location: ../index.php");
      // exit();
    } else {
      echo "Mot de passe incorrect ! <br>";
    }
  } else {
    echo "Login inconnu ! <br>";
  }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
  <title>Connexion</title>

</head>

<body>
  <header>
    <nav>
      <?php require 'header_menu.php'; ?>
    </nav>
  </header>

  <div class="container">
    <!-- afficher dans un else -->
    <form class="" action="" method="post">
      <h2>Se connecter</h2>
      <br>

      <label for="login">Login : </label>
      <input type="text" name="login" required value="" autofocus> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" required value="" autofocus> <br>
      <button type="submit" name="submit">Se connecter</button>
      <button type="submit" name="submit"><a href="registration.php">Inscription</a></button>
    </form>
  </div>
  <br>


</body>

</html>