<?php
	$link = new mysqli('localhost','root','','doomla');
	$id = "";
	$id = $_POST['id'];
	$sql = "DELETE FROM `pagecontent.` WHERE id=$id";
	mysqli_query($link, $sql);
	header('Location: index.php');
?>