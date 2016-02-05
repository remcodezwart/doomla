<?php
	require('../login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>verwijderen bevestigen</title>
	</head>
	<body>
		<h1>weet u zeker dat u onderstaande gebruiker wilt verwijderen?</h1>
		<form method="post" action="delete_logic.php">
		<input type="hidden" value="<?php echo $id?>"name="id"></input>
		<input type="submit" value="Ja"></input>
		</form>
		<form method="post" action="index.php">
			<input type="submit" value="Nee"></input>
		</form>
		<?php
		$stmt = $link->prepare("SELECT * FROM users WHERE id=?");
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$stmt->bind_result($id,$username,$password,$token,$expiry);
		$stmt->fetch();	
		?>
		<label>naam:<?php echo $username?></label>
		<br>
		<label>Wachtwoord:<?php echo $password?></label>
	</body>
</html>