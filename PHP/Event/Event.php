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
.lol{
    margin-left: 0%;
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
 <br> <br>
<a class="lol" href="Annulation.php">Annulation de réservation</a>

<h1>Évenement Inscription :</h1> <br>
<h3>Évenements en cours :	</h3>

<?php
			$id_eventStat= $db->prepare ( "SELECT id_event, titre, date1 , places_max FROM sae203_event" );
            $id_eventStat->execute ( ) ;
			$id_events= $id_eventStat->fetchAll( );
//affiche les evenements en cours en prenat toute les information dans la base de donnée
			foreach ( $id_events as $id_event ) {
				echo "<p class='oui'> Évenement n°". $id_event [ 'id_event' ] . "<strong>  Titre : </strong> " , $id_event [ 'titre' ] .  " <strong>  Le : </strong> " , $id_event [ 'date1' ]  . " <strong>  Places max </strong>  " , $id_event [ 'places_max' ] .  '</br> </p>' ;
				}
			


			?>

<fieldset>
		<legend>Évenement</legend>



			<form action="reserve_add.php" method="POST" id="form1" >

				<p>
				<legend> numéro de l'event </legend>
				<input type="number" name="event" id="event" >
			
				<br><br>
					<legend> Nombre de place </legend>
					<input type="number" name="place" id="place" min="1" max="100" required><br>
                    <br>
               
				</p>
				<input type="submit" name="valider" value="valider">
			
            </form>
       
        
		
	</fieldset>
<br>

<a href="../deco.php">Déconnexion</a>

</body>
</html>