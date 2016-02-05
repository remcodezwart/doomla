<?php
	require('login_chek.php');
?>
<!DOCTYPE html>

<html>
<head>
	<title>doomla pagina toevoegen</title>
	<link href="css/layout.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="container">
			<h2>Pagina toevoegen</h2>
			<form method="post" action="create_logic.php">
			<label>Pagina:</label>
			<input type="text" name="header"></input>
			<br>
			<label>Menu-optie:</label>
			<input type="text" name="option"></input>
			<label>Volgorden</label>
			<input type="number" name="order"></input>
			<label>template:(optioneel)</label>
			<input value="template" type="text" name="template"></input>
			<label>Inhoud:</label>
			<textarea name="page"></textarea>
			<input class="submit" value="opslaan" type="submit"></input>
			</form>
			<a href="index.php">annuleren</a>
	</div>
</body>
</html>