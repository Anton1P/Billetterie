<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Oui Oui Bageuette</title>
</head>
<body>
<style>
h1{
    margin-left: 40%;
}
fieldset{
	margin-left: 40%;
	margin-right: 50%;
}
</style>



<?php
include ('../connect_bdd.php');

session_start();

$mail=$_POST["mail"];
$mdp=$_POST['pass'];

$mdp1=sha1($mdp); //crypte le mdp

$mailStatement= $db->prepare ( "SELECT id_user, mail, mdp FROM sae203_user" );
$mailStatement->execute ( ) ;
$mailVerifs= $mailStatement->fetchAll( );


foreach ( $mailVerifs as $mailVerif ) {
    $users=array( $mailVerif [ 'mail' ]  => $mailVerif [ 'mdp' ] );;


	foreach($users as $key => $values ) {   //accès au compte admin
		if($mail== 'admin@zer' && $mdp1== 'c31423d620d192909810842362f161526ffbaf72'){
			$_SESSION['id_user']=3;
			$_SESSION['mail']=$mail;
			$_SESSION['pass']=$mdp1;
			header('location: ../Admin/EventAdmin.php');

		}
		

		else if( $mail == $key && $mdp1 == $values ) {
											//accès a un compte utilisateur
			$_SESSION['id_user']=$mailVerif[ 'id_user' ];
			$_SESSION['mail']=$mail;
			$_SESSION['pass']=$mdp1;
			header('location: ../Event/Event.php');
	
		}
	
		else {
							//message d'erreur
			echo "<script> alert('erreur dans la saisie du mot de passe ou mail invalide');
			window.location.href='../Connexion/connexion.html';
			</script>";
		   }
	
	
	}
	


    }



	?>

	

</body>
</html>