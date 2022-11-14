
    <?php
    
    session_start();
        $_SESSION['sexe'];
        $_SESSION['nom'];
        $_SESSION['prenom'];
        $_SESSION['mail'];
        $_SESSION['pass'];
    

        echo "Bonjours " .  $_SESSION['sexe'] .' '.  $_SESSION['prenom'] .' '.  $_SESSION['nom'] . ',' ;

        $sexe=$_SESSION['sexe'];
        $nom=$_SESSION['nom'];
        $prenom1=$_SESSION['prenom'];
        $mail=$_SESSION['mail'];
        $pass=$_SESSION['pass'];




//setup le mail avec les information dans l'url

$headers="From: Billeterie@gmail.com". "\r\n" ;
$headers.='Content-type: text/html; charset="UTF-8"'. "\r\n" ;
$message= "<h1>Bonjours, </h1>" . "\r\n";
$message.= "<h3>Cliquer sur le lien pour valider l'inscription, </h3> <br>" . "\r\n";
$message.= " <a href='https://paredant.tpweb.univ-rouen.fr/Sae203/Inscription/confirmation.php?sexe=$sexe&nom=$nom&prenom=$prenom1&mail=$mail&pass=$pass'>Confirmer</a> <br>" . "\r\n";



if (mail($_SESSION['mail'],"subject",$message ,$headers )) {

    echo "  <h2>Veuillez valider vorte compte grâce à l'email envoié ...</h2>  ";
}
else{
    echo"Échec de l'envoie du mail";
}

