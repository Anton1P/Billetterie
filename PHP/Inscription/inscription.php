<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription </title>
</head>
<body>

<?php
include ('../connect_bdd.php');
 ?>

    <?php
    session_start();
    

      $sexe=$_POST["sexe"];
      $nom=$_POST["nom"];
      $prenom1=$_POST["prenom"];
      $mail=$_POST["mail"];
      $pass=$_POST["pass"];
      $pass2=$_POST["pass2"];

  


    
$mailStatement= $db->prepare ( "SELECT mail FROM sae203_user" );
$mailStatement->execute ( ) ;
$mailVerifs= $mailStatement->fetchAll( );


$connect==0;


if ($pass==$pass2){ // vérification du mdp
       
    $pass=sha1($pass2);

    foreach ( $mailVerifs as $mailVerif ) { // Boucle pour vérifier si l'email est déjà prise 
        
        if ($mail== $mailVerif [ 'mail' ]   ){
             //affichage d'erreur
            echo "<script> alert('Il existe déjà un utilisateur avec le meme mail'); 
            window.location.href='../index.php';
    </script>";
    $connect=1;
    
}
            else if ($connect==0 && $mail!= $mailVerif [ 'mail' ]  ){


        
    $_SESSION['sexe']=$sexe;
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom1;
    $_SESSION['mail']=$mail;
    $_SESSION['pass']=$pass;

         header('location: mail.php'); //envoie un mail
   }
     
       
       }
   


}
else{
    echo "<script> alert('erreur dans la saisie du mot de passe');
    window.location.href='../index.php';
    </script>";
}




 ?>





  <style>

h2{
	margin-left: 33%;
}
</style>

</body>
</html>