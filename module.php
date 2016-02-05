<?php
	if(isset($_GET['page'])){      $page = $_GET['page'];
	}
	else $page = "home";
	function getModule($page){
		$subMenu = "";
		$link = new mysqli('localhost','root','','doomla');
		$query = "SELECT * FROM `pagecontent.` WHERE page='$page'";
		$result = $link->query($query);
		$Menu = $result->fetch_all(MYSQLI_ASSOC);
		
		foreach($Menu as $content){
			$subMenu = $content['content'];
		}
		return $subMenu;
	}
	
