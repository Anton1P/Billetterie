<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
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
 ?>




	<h1>Inscription</h1>


	<fieldset>
		<legend>Inscription</legend>


			<!-- formulire d'inscription -->
			<form action="Inscription/inscription.php" method="POST" id="form1" >

				<p>
					<legend> Sexe :</legend>
					Masculin<input type="radio" name="sexe" id="sexe" value="M">
					Féminin<input type="radio" name="sexe" id="sexe" value="Mme">	
					<br><br>
					<legend> Nom </legend>
					<input type="text" name="nom" id="nom" required><br>
                    <br>
                    <legend>Prénom </legend>
                    <input type="text" name="prenom" id="prenom" required>
                    <br>
					<legend>email </legend>
                    <input type="email" name="mail" id="mail" required>
                    <br>
					<legend>Mot de passe </legend>
                    <input type="password" name="pass" id="pass" minlength="8" required>
                    <br>
					<legend>Confirmer Mot de passe </legend>
					<input type="password" name="pass2" id="pass2" minlength="8" required>

				
					<br>
               
				</p>
				<input type="submit" name="valider" value="valider">
			
            </form>
       
            <a href="Connexion/connexion.html">Connexion</a> <br>
		
	</fieldset>

	


</body>
</html>