<?php

if (isset($_SESSION['user'][0]['login'])) {
    echo '<a href="index.php">• Accueil •</a>';
    echo '<a href="./php/profil.php">• Profil •</a>';
    echo '<a href="./php/logout.php">• Logout •</a>';
    echo '<a href="./php/commentaires.php">• Livre d\'or •</a>';

    // if ($_SESSION['user'][0]['login'] == 'admin') {
    //     echo '<a href="admin.php">• Page Admin •</a>';
    // }
} else {
    echo '<a href="index.php">• Accueil •</a>';
    echo '<a href="./php/login.php">• se connecter •</a>';
    echo '<a href="./php/registration.php">• s\'enregistrer •</a>';
    // echo '<a href="logout.php">• Logout •</a>';
}
