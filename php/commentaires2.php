<?php
require('config.php');

if (isset($_POST['id_utilisateur']) and isset($_POST['commentaire']))

    if ($_POST['commentaire'] != NULL) // si le commentaire n'est pas vide  

        if ($_POST['id_utilisateur'] != NULL) // si le commentaire n'est pas vide  

        {
            /* On utilise htmlentities pour empecher les gens d'inserer du html,  
tout code html sera affiché en tant que code html, il ne sera pas interpreté. 
et ent_quotes pour convertir les guillemets doubles et les guillemets simples: 
il faut noter que c'est pour des raisons de securité qu'on a fait ainsi */
            $id_utilisateur = htmlentities($_POST['id_utilisateur'], ENT_QUOTES);


            $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);
            $commentaire = nl2br($commentaire); // nl2br insère un retour à la ligne HTML à chaque nouvelle ligne  
            $date = date("d/m/Y"); //cette fonction permet de savoir la date de l'envoi de commentaire  

            mysqli_query($conn, "INSERT INTO commentaires VALUES('','$id_utilisateur','$commentaire','$date')");
        }
// exemple du projet module-connexion
// $query = "INSERT INTO utilisateurs VALUES('','$login','$nom','$prenom','$password')";
// mysqli_query($conn, $query);

// On commence par compter le nombre totale des commentaires  
$query = mysqli_query($conn, 'SELECT COUNT(*) FROM commentaires');
$d = mysqli_fetch_array($query);
$totalDesMessages = $d['COUNT(*)'];

// $requete = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE login = '$login'");
// $result = $requete->fetch_all(MYSQLI_ASSOC);
// $_SESSION['user'] = $result;

/*  On calcule le nombre de pages à créer , ce qu'on veut,  
c'est afficher 30 commentaires dans chaque page */
$nombreDePages  = ceil($totalDesMessages / 30);

//  on fait une boucle pour écrire les liens  des pages  
echo "page : ";
for ($i = 1; $i <= $nombreDePages; $i++) {
    echo '<a href="commentaires.php?page=' . $i . '">' . $i . '</a> ';
}

//Nous avons decidé d'utiliser un tableau pour afficher cette etiquette.  
echo '<table width=100%>  
<tr>  
<th width=10% bgcolor=green> id_utilisateur</th>  
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
$premierMessageAafficher = ($page - 1) * 30;

$reponse = mysqli_query($conn, 'SELECT * FROM commentaires ORDER BY id DESC LIMIT ' .
    $premierMessageAafficher . ', ' . 30);

while ($d = mysqli_fetch_array($reponse)) {
?>
    <table>
        <tr>
            <td width=900px bgcolor=#6495ED>
                <?php echo '<b>' . $d['id_utilisateur'] . ' </b><br/> ' . $d['date'] . ''; ?>
            </td>
            <td width=90% bgcolor=#cccccc>
                <?php echo $d['commentaire']; ?>
            </td>


    </table>


<?php
}

mysqli_close($conn); // on ferme la connexion à MySQL  
var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->

    <title>Livre d'or</title>
</head>

<body>
<header>
        <nav>
            <?php require 'header_menu.php'; ?>
        </nav>
    </header>

    <form method="post" action="commentaires.php">
        Pseudo : <input name="id_utilisateur" maxlength="8" /><br />
        Message :<br />
        <textarea name="commentaire" rows="8" cols="35"> </textarea> <br />
        <input type="submit" value="Envoyer" />
    </form>

</body>

</html>