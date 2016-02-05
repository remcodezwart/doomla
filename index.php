<?php 
$link = new mysqli('localhost','root','','doomla');
$page = "home";
$template = "template.php";
$content = "erorr page not found";
$id = 1;
$submenu = "";
$pageid = 0;
$contents = "";
 $page = isset($_GET['page'])? $_GET['page']: "home";
	//$chek = data($page,$link);
					// function data($page,$link){
					// 	$stmt = $link->prepare("SELECT * FROM `pagecontent.` WHERE page=?");
					//	$stmt->bind_param("s", $page);
					//	$stmt->execute();
					//	$stmt->bind_result($misc, $misc2,$usefull2,$misc4,$misc5,$usefull,$misc6);
					//	$stmt->fetch();
					//	$chek = $usefull;
					//	$chek .= ".php";
					//	return $chek;
					//}
					//$template = $chek;
	$query = "SELECT * FROM `pagecontent.` WHERE pagecontentid = 0 AND menuoption<>'' ORDER BY menuorder";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
	$menu = "<ul>";
	$pagesub = 0;
			foreach($pagecontent as $content){		
				$submenus = getSubmenu($link, $content['id']);
					if($page == $content['page']){
							$contents = $content['content'];
							$title = $content['page'];
							$chek = $content['template'];
							$menu .= "\n<li class=\"active\"><a href=\"?page=$content[page]\">$content[menuoption]</a>";
						}
					else{
							$menu .= "\n<li><a href=\"?page=$content[page]\">$content[menuoption]</a>";
					}
				if ($submenus != null) {
					$menu .= "<ul class=\"submenu\">";	
						foreach ($submenus as $submenu) {
							if($page == $content['page']){
								$content = $content['content'];
								$title = $content['page'];
								$chek = $content['template'];
								$menu .= "\n<li class=\"active\"><a href=\"?page=$submenu[page]\">$submenu[menuoption]</a></li>";
							}
							else{
								$menu .= "\n<li><a href=\"?page=$submenu[page]\">$submenu[menuoption]</a></li>";
							}
						}
					$menu .= "</ul>";
					continue;
				}
					$menu .= "</li>";
			}
				$menu .= "</ul>";
				
	function getSubmenu ($link ,$id) {
	$query = "SELECT * FROM `pagecontent.` WHERE pagecontentid = $id";
	$result = $link->query($query);
	if ($result->num_rows > 0) {
		$submenus = $result->fetch_all(MYSQLI_ASSOC);
		return $submenus;
	}
	$submenus = null;
	return $submenus;
}
	if ($contents == "") {
		$contents = "Error page not found";
		$title = "Error page not found";
		$menu = "";
	}
	if(isset($chek)){
		if(!($template == $chek)){
			$template = $chek;
			$template .= ".php";
		}
	}
	function getContent(){
		return $GLOBALS['contents'];		
	}
	function getMenu(){
		return $GLOBALS['menu'];
	}
	function getTitle(){
		return $GLOBALS['title'];	
	}
	$link->close();
	require  "module.php";
	if (isset($chek)) {
		if ($chek != null){
			require  "templates/$template";
		}
	}
	else{



		require "templates/template.php";
	}
?>