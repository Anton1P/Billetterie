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
    

      $sexe=$_GET["sexe"]; //prend les information dans l'url
      $nom=$_GET["nom"];
      $prenom1=$_GET["prenom"];
      $mail=$_GET["mail"];
      $pass=$_GET["pass"];



      $mailStatement= $db->prepare ( "SELECT mail FROM sae203_user" );
$mailStatement->execute ( ) ;
$mailVerifs= $mailStatement->fetchAll( );


     
// Boucle pour revérifier si l'email est déjà prise 
foreach($mailVerifs as $mailVerif) 
{
$bddMail = $mailVerif['mail_user'];		
}

if ( $bddMail == $mail) 	
		{
			echo "Cette adresse email existe déjà";
		
    }
  else {
    $sqlInsertQuery = "INSERT INTO sae203_user( civ , nom , prenom , mail , mdp ) VALUES ( :civ , :nom , :prenom , :mail , :mdp )" ; //Insert les information dans a base de donné
    $NewUser = $db->prepare ( $sqlInsertQuery ) ;
    
    $NewUser ->execute ( array (
    'civ' => $sexe ,
    'nom' =>  $nom,
    'prenom' => $prenom1 ,
    'mail' => $mail ,
    'mdp' => $pass ));
        
     
  }  
  
      

       
      
       
     
    


      



 ?>

<a href="../Connexion/connection.php">Connexion</a>

  <style>

h2{
	margin-left: 33%;
}
</style>

</body>
</html>