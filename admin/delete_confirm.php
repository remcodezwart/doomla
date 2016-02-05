<?php 
	require('login_chek.php');
    $id = $_GET['id'] ;
	$link = new mysqli('localhost','root','','doomla');
	$query = "SELECT * FROM `pagecontent.` WHERE id=$id ";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doomla pagina verwijderen</title>
	<link href="css/layout.css" type="text/css" rel="stylesheet">
</head>
<body>
	<h1>Pagina verwijderen</h1>
	<p>weet u zeker dat u onderstaande pagina wilt verwijderen?</p>
	<form method="post" action="delete_logic.php" class="submitting">
	<input type="hidden" name="id" value="<?php echo $id ?>"></input>
	<input class="submit"  type="submit" value="Ja"></input>
	</form>
	<form action="index.php" class="submitting">
	<input class="submit"  type="submit" value="Nee"></input>
	</form>
	<br>
	<?php foreach($pagecontent as $content){ ?>
	<label>Pagina:<?php echo $content['page']?></label>
	<br>
	<label>Menu-optie <?php echo $content['menuoption']?></label>
	<br>
	<label>Inhoud:</label><?php echo $content['content'];
				};
		?>
</body>
</html>