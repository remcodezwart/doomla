<?php
	require('../login_chek.php');
	$link = new mysqli('localhost','root','','doomla');
	$query = "SELECT * FROM `users`";
	$result = $link->query($query);
	$users = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
		<link href="../css/layout.css" type="text/css" rel="stylesheet">
	</head>
	<body>
	<h1>gebruikers overzicht</h1>
		<a href="add.php">gebruiker toevoegen</a>
		<a href="../index.php">content overzicht</a>
		<table>
		<?php foreach($users as $inforamtion){?>
			<tr>
				<th>Naam</th>
				<th>Wachtwoord</th>
				<th>editen</th>
				<th>verwijderen</th>
			</tr>
			<tr>
				<td><?php echo $inforamtion['name'] ?></td>
				<td><?php echo $inforamtion['password'] ?></td>
				<td><a href="edit.php?id=<?php echo $inforamtion['id']?>">editen</a></td>
				<td><a href="delete.php?id=<?php echo $inforamtion['id']?>">verwijderen</a></td>
				
		<?php } ?>
			</tr>
		</table>
	</body>
</html>