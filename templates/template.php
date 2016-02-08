<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo getTitle()?></title>
	<link rel="stylesheet" href="templates/template.php">
	<link href="css/layout.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<header>
		<section>
			<nav>
			 <?php echo getMenu();?>
			</nav>
		</section>
		</header>
			<article>
			  <?php echo getContent();?>
			</article>
			<aside>
			<?php echo getModule('contact') 
			?>
			</aside>
		<footer>
		@ Remco de Zwart 2016
		</footer>
	</div>
</body>
</html>