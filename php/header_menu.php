<?php

if (isset($_SESSION['user'][0]['login'])) {
    echo '<a href="../index.php">- Accueil -</a>';
    echo '<a href="profil.php">- Profil -</a>';
    echo '<a href="commentaires.php">- Commentaire -</a>';
    echo '<a href="livreor.php">- Livre d\'or -</a>';
    echo '<a href="logout.php">- Logout -</a>';

    if ($_SESSION['user'][0]['login'] == 'admin') {
        echo '<a href="admin.php">- Page Admin -</a>';
    }
} else {
    echo '<a href="../index.php">- Accueil -</a>';
    echo '<a href="login.php">- se connecter -</a>';
    echo '<a href="registration.php">- s\'enregistrer -</a>';
    echo '<a href="livreor.php">- Livre d\'or -</a>';
    // echo '<a href="logout.php">- Logout -</a>';
}
