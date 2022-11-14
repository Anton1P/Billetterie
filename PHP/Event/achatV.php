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
session_start();
echo " sur le compte de ";
echo $_SESSION['mail'] ;
 ?>
 <h2>Historique :</h2> <br>
    <?php
  




    $id_userStatement= $db->prepare ( "SELECT id_user, mail FROM sae203_user" );
    $id_userStatement->execute ( ) ;
    $id_users= $id_userStatement->fetchAll( );

    foreach ( $id_users as $id_user ) {

        if( $_SESSION['mail'] == $id_user [ 'mail' ] ) { 

            //permet de prendre les informations nécessaire pour faire un historique de réservation
            $id_reserveStat= $db->prepare ( "SELECT id_reserve , id_user,id_event , places FROM sae203_reserve" );
            $id_reserveStat->execute ( ) ;
            $id_reserves= $id_reserveStat->fetchAll( );

             foreach ( $id_reserves as $id_reserve ) {

     

                   if( $id_user [ 'id_user' ]  == $id_reserve [ 'id_user' ] ) { 

         //affiche tout les achats du compte
                    echo "<h2>Achat Validé !<h2>" ;
                           echo "<h2>Votre code de réservation est #". $id_reserve [ 'id_reserve' ] . " pour " . $id_reserve [ 'places' ]  . " place(s) à l'événement n°". $id_reserve [ 'id_event' ] ."<h2>" ;
         




        }
    }
        }
    }



 ?>

<a href="../Event/Event.php">Retour</a> <br> <br>
<a href="../deco.php">Déconnexion</a>

  <style>

h2, a{
	margin-left: 33%;
}
</style>

</body>
</html>