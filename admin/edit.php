<?php 
	require('login_chek.php');
	$id = $_GET['id'];
	$link = new mysqli('localhost','root','','doomla');
	$query = "SELECT * FROM `pagecontent.` WHERE id=$id";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYEPE html>
<html>
<head>
	<title>doomla pagina wijzigen</title>
	<link href="css/layout.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
<?php foreach($pagecontent as $content){ ?>
			
			<h2>Pagina wijzigen</h2>
			<form method="post" action="edit_logic.php">
			<input value="<?php echo $content['id'] ?>" type="hidden" name="id"></input>
			<label>Pagina:</label>
			<input value="<?php echo $content['page'] ?>" type="text" name="page"></input>
			<br>
			<label>Menu-optie:</label>
			<input value="<?php echo $content['menuoption'] ?>" type="text" name="option"></input>
			<label>Volgorden</label>
			<input type="number" value=<?php echo $content['menuorder'] ?> name="order"></input>
			<label>template:(optioneel)</label>
			<input value="template" type="text" name="template"></input>
			<label>Inhoud:</label>
			<textarea type="text" name="content"> <?php echo $content['content'] ?>   </textarea>
			<input class="submit" value="opslaan" type="submit"></input>
			</form>
			<?php 
				}
			?>
			<a href="index.php">annuleren</a>
	</div>
</body>
</html>