<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST');
	$link = new mysqli('localhost','root','','doomla');
	function setSession($username){
		$link = new mysqli('localhost','root','','doomla');
		$token = (rand(1,9999999));
		$token = (string)$token;
		$expiring = time() + 600;
		setcookie("Token", $token, $expiring);
		setcookie("User", $username, $expiring);
		$username="jan";
		$stmt = $link->prepare("UPDATE user SET  token=?, expiry=? WHERE name=? ");
		$stmt->bind_param("sss", $token, $expiring, $username);
		$stmt->execute();
		$link->close();
		header("Location:index.php");
	}
	if($link->connect_error){
		die("Connection failed: " . $link->connect_error);
	}	
	$username = "";
	$password = "";
	if(isset($_POST['user'])){
		$username = $_POST['user'];
	}
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	if(!($password != "" || $username != "")){
		$erorr = "paswoord of usernaam leeg";
	}
	else{
	$query = "SELECT * FROM user ";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
		foreach($pagecontent as $cheking){
			if($username == $cheking['name'] && $password == $cheking['password']){
				setSession($username);
			}
		}
		$erorr = "foute gebruikersnaam of wachtwoord";
		
		}
	
?>
<!DOCTYPE html>

<html>
<head>
	<title>Aanmelden</title>
	<link href="css/layout.css" type="text/css" rel="stylesheet">
</head>
<body class="loginbackground">
	<h1>Aanmelden</h1>
	
		<form method="post" action="#">
			<label>Gebruiker:</label>
			<span class="marginUser"></span><input type="text" class="login" placeholder="gebruikersnaam" name="user"></input>
			<br>
			<label>Wachtwoord:</label>
			<input type="password" class="login" name="password" placeholder="wachtwoord"></input>
			<br>
			<input type="submit" class="confirm" value="Aanmelden"></input>
		</form>
		<p><?php if(isset($erorr)) echo $erorr ?></p>
</body>
</html>