<!doctype html>
<html lang="en">
	<head>
		<title>Tasty Recipes Meatballs</title>
		<?php 
		include TASTY_RECIPES_FRAGMENTS . 'css.php';
		?>
                <link 	rel = "stylesheet"
                        type = "text/css"
                        href = "resources/css/recipe.css" />
	</head>
	<body>
		<header>
			<?php
			$head = 'Meatballs';
			$page = 'meatballs.php';
			include TASTY_RECIPES_FRAGMENTS . 'header.php';
			?>
		</header>
		<nav>
			<ul>
				<li><a class="navLink" href="home.php">Home</a></li>
				<li><a class="navLink" href="register.php">Register</a></li>
				<li><a class="navLink" href="calendar.php">Calendar</a></li>
				<li class="navLink" id="active">Meatballs</li>
				<li><a class="navLink" href="pancakes.php">Pancakes</a></li>
			</ul>
		</nav>
		<div id="middle">
			<?php 
			$recipeNumber = 0;
			$recipeName = "meatballs";
			include TASTY_RECIPES_FRAGMENTS . 'recipeInformation.php';
			?>
			<aside id="comments">
				<?php
				$recipe = 'meatballs';
				include TASTY_RECIPES_FRAGMENTS . 'recipeAsideRight.php';
				?>
			</aside>
		</div>
		<footer>
			<?php 
			include TASTY_RECIPES_FRAGMENTS . 'footer.php';
			?>
		</footer>
	</body>
</html>