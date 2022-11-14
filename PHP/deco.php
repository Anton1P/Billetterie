<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page 2</title>
</head>
<body>


	<?php
    //Déconnexion
    session_start();

    session_unset();

    session_destroy();

    header('Location: Connexion/connexion.html'); 

    ?>
  





</body>
</html>