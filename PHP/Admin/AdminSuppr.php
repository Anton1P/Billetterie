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


<h1>Évenement Inscription :</h1> <br>
<h3>Évenements en cours :	</h3>

<?php






$suppr=$_POST['suppr'];
$_SESSION['suppr']=$suppr;

$sqlDeleteQuery = "DELETE FROM sae203_event WHERE id_event=:id_event" ;
$supprimerFilm = $db->prepare ( $sqlDeleteQuery ) ;
$supprimerFilm->execute ( array (
'id_event' => $suppr)) ;


$sqlDeleteQuery2 = "DELETE FROM sae203_reserve WHERE id_event=:id_event" ;
$supprimerFilm2 = $db->prepare ( $sqlDeleteQuery2 ) ;
$supprimerFilm2->execute ( array (
'id_event' => $suppr)) ;



$id_eventStat= $db->prepare ( "SELECT id_event, titre, date1 , places_max FROM sae203_event" );
$id_eventStat->execute ( ) ;
$id_events= $id_eventStat->fetchAll( );

foreach ( $id_events as $id_event ) {
    echo "<p class='oui'> Évenement n°". $id_event [ 'id_event' ] . "<strong>  Titre : </strong> " , $id_event [ 'titre' ] .  " <strong>  Le : </strong> " , $id_event [ 'date1' ]  . " <strong>  Places max </strong>  " , $id_event [ 'places_max' ] .  '</br> </p>' ;
    }
    echo "<h2> Veuillez répéter ce procédé si l'évènement ne s'est pas supprimer pour confirmer la suppression de l'évènement car des places ont déjà été achtées </h2>"



			?>





<br>
<a href="../Admin/EventAdmin.php"> Cliqué ici pour confirmer la suppression de l'évènement</a> <br><br><br>
<a href="../Admin/EventAdmin.php">Acceuil Admin</a>
 <a href="../deco.php">Déconnexion</a>

</body>
</html>