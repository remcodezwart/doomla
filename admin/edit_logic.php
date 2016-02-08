<?php 
	$link = new mysqli('localhost','root','','doomla');
	$id = "";
	$id = $_POST['id'];
	$content = $_POST['content'];
	$page = $_POST['page'];
	$menu = $_POST['option'];
	$order = $_POST['order'];
	$template = $_POST['template'];
	$stmt = $link->prepare("UPDATE `pagecontent.` SET page=?,content=?,menuoption=?,menuorder=?,template=? WHERE id=?") ;
	$stmt->bind_param("ssssss", $page,$content,$menu,$order,$template,$id);
	$stmt->execute();
	header('Location: index.php');
?>