<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>reserve add </title>
</head>
<body>

<?php
include ('../connect_bdd.php');
 ?>

    <?php
    session_start();
    $_SESSION['mail'];
    $event=$_POST["event"];
    $place=$_POST["place"];


    $id_userStatement= $db->prepare ( "SELECT id_user, mail FROM sae203_user" );
    $id_userStatement->execute ( ) ;
    $id_users= $id_userStatement->fetchAll( );

    foreach ( $id_users as $id_user ) {

        if( $_SESSION['mail'] == $id_user [ 'mail' ] ) { 

            
            $id_eventStat= $db->prepare ( "SELECT id_event FROM sae203_event" );
            $id_eventStat->execute ( ) ;
			$id_events= $id_eventStat->fetchAll( );

			foreach ( $id_events as $id_event ) {

                if( $event == $id_event [ 'id_event' ] ) { 

                    $sqlInsertQuery = "INSERT INTO sae203_reserve( id_user , id_event , places ) VALUES ( :id_user , :id_event , :places )" ; 
                    $NewUser = $db->prepare ( $sqlInsertQuery ) ;
                    //ajoute une réservation au nom de l'utilisateur
                    $NewUser ->execute ( array (
                    'id_user' => $id_user [ 'id_user' ] , 
                    'id_event' =>  $event,
                    'places' => $place ,
                     ));
            
                     header('location: achatV.php');
            


                }
              
		else {
		
			echo "<script> alert('erreur dans la saisie de l évenement');
			window.location.href='./Event.php';
			</script>";
		   }
                

  

        }


    }
}

 


  





 ?>




  <style>

h2{
	margin-left: 33%;
}
</style>

</body>
</html>