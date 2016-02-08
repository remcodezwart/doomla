<?php 
	$link = new mysqli('localhost','root','','doomla');
	$id = "";
	$id = $_POST['id'];
	$content = $_POST['content'];
	$page = $_POST['page'];
	$menu = $_POST['option'];
	$order = $_POST['order'];
	$template = $_POST['template'];
	$under = $_POST['under'];
	$stmt = $link->prepare("UPDATE `pagecontent.` SET page=?,content=?,menuoption=?,menuorder=?,template=?,pagecontentid=? WHERE id=?") ;
	$stmt->bind_param("sssssss", $page,$content,$menu,$order,$template,$under,$id);
	$stmt->execute();
	header('Location: index.php');
?>