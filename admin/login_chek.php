<?php
	 $link = new mysqli('localhost','root','','doomla');
	 $username  = "";
	 getAccessUsername();
	 checkAccess();
	function checkAccess(){
		 $username = getAccessUsername();
		 setSession($username);
	}
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
	}
	function getAccessUsername(){
		$link = new mysqli('localhost','root','','doomla');
	if(count($_COOKIE) <= 0){
		header("Location:login.php");
	}
	if($_COOKIE["User"] && $_COOKIE["Token"]){
			$user = "User";
			$Token = "Token";
			$query = "SELECT * FROM user ";
			$result = $link->query($query);
			$pagecontent = $result->fetch_all(MYSQLI_ASSOC);	
		foreach($pagecontent as $cheking){
			$now = time();
			if($_COOKIE[$user] == $cheking['name'] 
			&& $_COOKIE[$Token] == $cheking['token']
			&& $now < $cheking['expiry']);
			{	
				$username  = $_COOKIE[$user];
				return $username;
			}	
			}
			header("Location:login.php");
		}
		header("Location:login.php");
		$link->close();
	}
?>