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

    <title>Livre d'or</title>
</head>

<body>
    <header>
        <nav>
            <?php require 'header_menu.php'; ?>
        </nav>
    </header>

    <!-- <form method="post" action="">
        Message :<br />
        <textarea name="commentaire" rows="8" cols="35"> </textarea> <br />
        <input type="submit" value="Envoyer" />
    </form> -->

</body>

</html>
<?php

// if (isset($_POST['commentaire']))

//     if ($_POST['commentaire'] != NULL) // si le commentaire n'est pas vide  


//     {
//         /* On utilise htmlentities pour empecher les gens d'inserer du html,  
// tout code html sera affiché en tant que code html, il ne sera pas interpreté. 
// et ent_quotes pour convertir les guillemets doubles et les guillemets simples: 
// il faut noter que c'est pour des raisons de securité qu'on a fait ainsi */
//         $login = $_SESSION['user'][0]['login'];
//         $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);
//         $requestate = date("Y/m/d H:i:s"); //cette fonction permet de savoir la date de l'envoi de commentaire 
//         // $id_user = $_SESSION['user'][0]['id'];

//         $result = $mysqli->query("SELECT utilisateurs.id, commentaires.id_utilisateur FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur");
//         $result = $result->fetch_all(MYSQLI_ASSOC);
//     }

// On commence par compter le nombre totale des commentaires  
$query = mysqli_query($conn, 'SELECT COUNT(*) FROM commentaires');
$request_count = mysqli_fetch_array($query);
$totalDesMessages = $request_count['COUNT(*)'];
// var_dump($totalDesMessages);


/*  On calcule le nombre de pages à créer , ce qu'on veut,  
c'est afficher 30 commentaires dans chaque page */
$nombreDePages  = ceil($totalDesMessages / 10);

//  on fait une boucle pour écrire les liens  des pages  
?>

<div class="pages_count">
    <?php
    echo "Page : ";
    for ($i = 1; $i <= $nombreDePages; $i++) {
        echo '<a href="livreor.php?page=' . $i . '">' . $i . '</a> ';
    }
    ?>
</div>

<?php
//Nous avons decidé d'utiliser un tableau pour afficher cette etiquette.  
echo '<table width=100%>  
<tr>  
<th width=10% bgcolor=green>Pseudo</th>  
<th width=10% bgcolor=green>Date</th>  
<th width=90% bgcolor=green>Message</font></th>  
</tr>  
</table>';

if (isset($_GET['page'])) {
    // On récupère le numéro de la page indiqué  dans l'adresse (ex: commentaires.php?page=4)  
    $page = $_GET['page'];
} else // si la variable n'existe pas alors c'est la première fois qu'on charge la page.  
{
    // alors on va afficher la page 1 qui va contenir les dernier commentaires.  
    $page = 1;
}

// maintenant calcule le numéro du premier commentaire .  
$premierMessageAafficher = ($page - 1) * 10;

$reponse = mysqli_query($conn, 'SELECT commentaires.commentaire, commentaires.date, utilisateurs.login  FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur ORDER BY commentaires.id DESC LIMIT ' . $premierMessageAafficher . ', ' . 10);

while ($request = mysqli_fetch_array($reponse)) {
?>
    <table class="table_livreor">
        <tr>
            <td width=10% bgcolor=#6495ED>
                <?php echo '<b>' . $request['login'] . '</b>'; ?>
            </td>
            <td width=10% bgcolor=#6495ED>
                <?php echo $request['date']; ?>
            </td>
            <td width=90% bgcolor=#cccccc class="comm">
                <?php echo $request['commentaire']; ?>
            </td>


    </table>
<?php
}
?>
<div class="pages_count">
    <?php
    echo "Page : ";
    for ($i = 1; $i <= $nombreDePages; $i++) {
        echo '<a href="livreor.php?page=' . $i . '">' . $i . '</a> ';
    }

    // var_dump($reponse);
    mysqli_close($conn); // on ferme la connexion à MySQL  
    ?>
</div>