<?php
$link = new mysqli('localhost','root','','doomla');
$query = "SELECT * FROM `pagecontent.` WHERE pagecontentid = 0 AND menuoption<>''";
$result = $link->query($query);
$pages = $result->fetch_all(MYSQLI_ASSOC);

echo "<ul>";

foreach ($pages as $page) {
	$submenus = getSubmenu($link, $page['id']);
	echo "<li>" . $page['page'] . "</li>";
	if ($submenus != null) {
		echo "<ul>";	
			foreach ($submenus as $submenu) {
				echo "<li>" . $submenu['page'] . "</li>";
			}
		echo "</ul>";
	}
	
}
echo "</ul>";

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
?>