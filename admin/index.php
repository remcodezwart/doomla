<?php 
	require('login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$query = "SELECT * FROM `pagecontent.`";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>doomla-beheer</title>
	<link href="css/layout.css" type="text/css" rel="stylesheet">
</head>
<body>
<a href="create.php">Pagina toevoegen</a>
<a href="loguit.php">Afmelden</a>
<a href="user/index.php">gebruikers overzicht</a>
	<table>
	<?php foreach($pagecontent as $content){ ?>
			<tr>
				<th class="left">Pagina</th>
				<th class="center">Inhoud</th>
				<th class="right">Menu-optie</th>
				<th>Volgorden</th>
				<th>template</th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td><?php echo $content['page']?></td>
				<td><?php echo $content['content']?></td>
				<td><?php echo $content['menuoption']?></td>
				<td><?php echo $content['menuorder']?></td>
				<td><?php echo $content['template']?></td>
				<td><a href="delete.php?id=<?php echo $content['id']?>">Verwijderen</td>
				<td><a href="edit.php?id=<?php echo $content['id']?>">Bewerk</td>
			<?php 
				}
			?>
			</tr>
	</table>
</body>
</html>