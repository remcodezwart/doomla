<?php
	$link = new mysqli('localhost','root','','doomla');
	$h1 = "<h1>"; //the header of the page ends up here
	$h1end = "</h1>";
	$pagragraphe = "<p>"; //the content of the page ends up here
	$pagragrapheEnd = "</p>";
	$template = "template.php";
	$template = $_POST['template'];
	$order = $_POST['order'];
	$header = $_POST['header'];
	$headerPage = $_POST['header'];
	$page = $_POST['page'];
	$h1 .= $header .= $h1end;
	$pagragraphe .= $page .=$pagragrapheEnd;
	$h1 .= $pagragraphe;
	$option = $_POST['option'];
	$under = $_POST['under'];
	$stmt = $link->prepare("INSERT INTO `pagecontent.` (`page`,`content`,`menuoption`,`menuorder`,`template`,`pagecontentid`)
	VALUES(?,?,?,?,?,?)");
	$stmt->bind_param("ssssss", $headerPage,$h1,$option,$order,$template,$under);
	$stmt->execute();
	header('Location: index.php');
?>