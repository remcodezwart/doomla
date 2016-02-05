<?php 
	$link = new mysqli('localhost','root','','doomla');
	$id = "";
	$id = $_POST['id'];
	$content = $_POST['content'];
	$page = $_POST['page'];
	$menu = $_POST['option'];
	$order = $_POST['order'];
	$template = $_POST['template'];
	$sql = "UPDATE `pagecontent.` SET page='$page',content='$content',menuoption='$menu',menuorder='$order',template='$template' WHERE id='$id'" ;
	mysqli_query($link, $sql);
	header('Location: index.php');
?>