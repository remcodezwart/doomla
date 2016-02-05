<?php
	require('../login_chek.php');
?>


<!DOCTYPE html>

<html>
	<head>
		<title>gebruiker toevoegen</title>
	</head>
	<body>
	<h1>gebruiker toevoegen</h1>
	<form action="create_logic.php" method="post">
		<label>gebruikersnaam</label>
		<input type="text" name="username" placeholder="gebruikersnaam" required></input>
		<br>
		<label>wachtwoord</label>
		<input type="text" name="password" placeholder="wachtwoord" required></input>
		<br>
		<input type="submit" value="opslaan"></input>
	</form>
		<a href="index.php">annuleren</a>
	</body>
</html>