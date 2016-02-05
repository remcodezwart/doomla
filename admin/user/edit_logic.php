<?php
	require('../login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$stmt = $link->prepare("UPDATE users SET name=?, password=? WHERE id=? ");
	$stmt->bind_param("sss",$username,$password,$id);
	$stmt->execute();
	header('Location: index.php');
?>