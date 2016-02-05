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
			<aside>
			<?php echo getModule('contact') 
			?>
			</aside>
			<article>
			  <?php echo getContent();?>
			</article>
		<footer>
		@ Remco de Zwart 2016
		</footer>
	</div>
</body>
</html>