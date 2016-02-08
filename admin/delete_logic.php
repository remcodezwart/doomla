<?php
	$link = new mysqli('localhost','root','','doomla');
	$id = "";
	$id = $_POST['id'];
	$stmt = $link->prepare("DELETE FROM `pagecontent.` WHERE id=?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	header('Location: index.php');
?>