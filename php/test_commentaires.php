<?php
require('config.php');

if (isset($_POST['pseudo']) and isset($_POST['message']))

    if ($_POST['message'] != NULL) // si le message n'est pas vide  

        if ($_POST['pseudo'] != NULL) // si le message n'est pas vide  

        {
            /* On utilise htmlentities pour empecher les gens d'inserer du html,  
tout code html sera affiché en tant que code html, il ne sera pas interpreté. 
et ent_quotes pour convertir les guillemets doubles et les guillemets simples: 
il faut noter que c'est pour des raisons de securité qu'on a fait ainsi */
            $pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES);


            $message = htmlentities($_POST['message'], ENT_QUOTES);
            $message = nl2br($message); // nl2br insère un retour à la ligne HTML à chaque nouvelle ligne  
            $date = date("d/m/Y"); //cette fonction permet de savoir la date de l'envoi de message  

            mysqli_query($conn, "INSERT INTO commentaires VALUES('','$id_utilisateur','$commentaire','$date')");
        }

// On commence par compter le nombre totale des messages  
$query = mysqli_query($conn, 'SELECT COUNT(*) FROM commentaires');
$d = mysqli_fetch_array($query);
$totalDesMessages = $d['COUNT(*)'];

/*  On calcule le nombre de pages à créer , ce qu'on veut,  
c'est afficher 30 messages dans chaque page */
$nombreDePages  = ceil($totalDesMessages / 30);

//  on fait une boucle pour écrire les liens  des pages  
echo "page : ";
for ($i = 1; $i <= $nombreDePages; $i++) {
    echo '<a href="guestbook.php?page=' . $i . '">' . $i . '</a> ';
}

//Nous avons decidé d'utiliser un tableau pour afficher cette etiquette.  
echo '<table width=100%>  
<tr>  
<th width=10% bgcolor=green> pseudo</th>  
<th width=90% bgcolor=green>Message</font></th>  
</tr>  
</table>';

if (isset($_GET['page'])) {
    // On récupère le numéro de la page indiqué  dans l'adresse (ex: guestbook.php?page=4)  
    $page = $_GET['page'];
} else // si la variable n'existe pas alors c'est la première fois qu'on charge la page.  
{
    // alors on va afficher la page 1 qui va contenir les dernier messages.  
    $page = 1;
}

// maintenant calcule le numéro du premier message .  
$premierMessageAafficher = ($page - 1) * 30;

$reponse = mysqli_query($conn, 'SELECT * FROM commentaires ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . 30);

while ($d = mysqli_fetch_array($reponse)) {
    ?>
    <table>
        <tr>
            <td width=900px bgcolor=#6495ED>
                <?php echo '<b>' . $d['pseudo'] . ' </b><br/> ' . $d['date'] . ''; ?>
            </td>
            <td width=90% bgcolor=#cccccc>
                <?php echo $d['message']; ?>
            </td>


    </table>


<?php
}

mysqli_close($conn); // on ferme la connexion à MySQL  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post" action="commentaires.php">
        Pseudo : <input name="pseudo" maxlength="8" /><br />
        Message :<br />
        <textarea name="message" rows="8" cols="35"> </textarea> <br />
        <input type="submit" value="Envoyer" />
    </form>

</body>

</html>