<?php
	if(isset($_GET['page'])){      $page = $_GET['page'];
	}
	else $page = "home";
	function getModule($page){
		$subMenu = "";
		$link = new mysqli('localhost','root','','doomla');
		$stmt = $link->prepare("SELECT * FROM `pagecontent.` WHERE page=?");
		$stmt->bind_param("s", $page);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$Menu = $result->fetch_all(MYSQLI_ASSOC);

		foreach($Menu as $content){
			$subMenu = $content['content'];
		}
		return $subMenu;
	}
	
