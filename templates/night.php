<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo getTitle()?></title>
	<link rel="stylesheet" href="templates/template.php">
	<link href="css/night.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wraper">
		<header>
		<section>
			<nav>
			 <?php echo getMenu();?>
			</nav>
		</header>
			<article>
			  <?php echo getContent();?>
			</article>
		</section>
		<footer>
		@ Remco de Zwart 2016
		</footer>
	</div>
</body>
</html>