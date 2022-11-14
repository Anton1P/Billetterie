<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Évenement 1</title>
</head>
<body>
<style>
.oui,h1, a, h3{
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

      
            $id_reserveStat= $db->prepare ( "SELECT id_reserve , id_user,id_event , places FROM sae203_reserve" );
            $id_reserveStat->execute ( ) ;
            $id_reserves= $id_reserveStat->fetchAll( );

             foreach ( $id_reserves as $id_reserve ) {

     

                   if( $id_user [ 'id_user' ]  == $id_reserve [ 'id_user' ] ) { 

         
                  
                           echo "<h2>Votre code de réservation est #". $id_reserve [ 'id_reserve' ] . " pour " . $id_reserve [ 'places' ]  . " place(s) à l'événement n°". $id_reserve [ 'id_event' ] ."<h2>" ;
         




        }


    }



      

        }


    }


 






 ?>
<fieldset>
		<legend>Évenement</legend>


			<form action="Annulation.php" method="POST" id="form1" >

				<p>
				<legend> Numéro de réservation </legend>
				<input type="number" name="suppr" id="suppr" >
			
				
				</p>
				<input type="submit" name="valider" value="Supprimer">
			
            </form>
       
        
		
	</fieldset><br>
	<a href="Annulation.php">Actualisé</a><br>
<?php

$suppr=$_POST['suppr'];
 //supprime le numero de l'event choisie dans le formulaire
        $sqlDeleteQuery = "DELETE  FROM sae203_reserve WHERE id_reserve=:id_reserve AND id_user=:id_user";

        $supprimerevent = $db->prepare($sqlDeleteQuery);

        $supprimerevent->execute(array
        ('id_reserve' => $suppr,
         'id_user'  => $_SESSION['id_user']
        )
        );
			?>





<br>

<a href="../Event/Event.php">Accueil</a> <br> <br>
 <a href="../deco.php">Déconnexion</a>

</body>
</html>