<?php
	require('../login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$id = $_POST['id'];
	$stmt = $link->prepare("DELETE FROM users WHERE id=?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	header('Location: index.php');
?>