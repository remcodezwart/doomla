<?php
	require('../login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$id = $_GET['id'];
	$stmt = $link->prepare("SELECT * FROM users WHERE id=?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$stmt->bind_result($id,$username,$password,$token,$expiry);
	$stmt->fetch();	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Doomla gebruiker wijzigen</title>
	</head>
	<body>
	<h1>gebruiker wijzigen</h1>
	<form action="edit_Logic.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id ?>"></input>
	<label>gebruikersnaam</label>
	<input value="<?php echo $username ?>"name="username" type="text"></input>
	<br>
	<label>wactwoord</label>
	<input value="<?php echo $password ?>"name="password" type="text"></input>
	<br>
	<input type="submit" value="opslaan"></input>
	</form>
	<a href="index.php">annuleren</a>
	</body>
</html>