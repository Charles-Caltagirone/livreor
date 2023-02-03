<?php
require 'config.php';
$servername = 'localhost';
$username = 'root';
$password = '';

if ($_SESSION['user'][0]['login'] != 'admin') {
    header("Location: index.php");
}


// On récupère tout le contenu de la table etudiants
$sqlQuery = 'SELECT * FROM utilisateurs';
$utilisateursStatement = $conn->query($sqlQuery);
$utilisateurs = $utilisateursStatement->fetch_all(MYSQLI_ASSOC);
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <title>Page Admin</title>
</head>

<body>
    <header>
        <nav>
            <?php require 'header_menu.php'; ?>
        </nav>
    </header>
    <div class="container">

        <table>
            <h2>Informations des users</h2>

            <thead>
                <tr>
                    <th>id</th>
                    <th>Utilisateur</th>
                    <th>Mot de passe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($utilisateurs as $utilisateurs) {
                ?>
                    <tr>
                        <?php echo "<td>" . $utilisateurs['id'] . "</td>" ?>
                        <?php echo "<td>" . $utilisateurs['login'] . "</td>" ?>
                        <?php echo "<td>" . $utilisateurs['password'] . "</td>" ?>
                    <?php
                }
                    ?>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>