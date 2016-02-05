<?php
	require('../login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$token = 0;
	$expiry = 0;
	$stmt = $link->prepare("INSERT INTO users (name,password,token,expiry) VALUES(?,?,?,?)");
	$stmt->bind_param("ssss", $username,$password,$token,$expiry);
	$stmt->execute();
	header('Location: index.php');
?>