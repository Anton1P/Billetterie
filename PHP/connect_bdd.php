<?php
try
{
$db = new PDO( 'mysql:host=localhost;dbname=db-paredant' , 'usr-paredant' , 'pie3siyutu') ;
}
catch ( Exception $e )
{
die ( 'Erreur : ' . $e->getMessage ( ) ) ;
}
 ?>

Connecté