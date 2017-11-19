<?php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Tasty Recipes Pancakes</title>
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "css/reset.css"/>
		
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "css/common.css"/>
			
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "css/recipe.css"/>
	</head>
	<body>
		<?php
		$head = 'Pancakes';
		include 'fragments/header.php';
		?>
		<nav>
			<ul>
				<li><a class="navLink" href="home.php">Home</a></li>
				<li><a class="navLink" href="register.php">Register</a></li>
				<li><a class="navLink" href="calendar.php">Calendar</a></li>
				<li><a class="navLink" href="meatballs.php">Meatballs</a></li>
				<li class="navLink" id="active">Pancakes</li>
			</ul>
		</nav>
		<div id="middle">
			<figure>
				<img src="img/pancakes.jpg" alt="Pancakes">
			</figure>
			<aside id="ingredients">
				<h3>Ingredients for <?php 
    			$xml = simplexml_load_file('xml/recipe.xml');
    			echo $xml->recipe[1]->quantity; ?> servings</h3>
				<?php 
    			$xml = simplexml_load_file('xml/recipe.xml');
    			foreach ($xml->recipe[1]->ingredient->li as $ingredient) {
    				echo "<p>" . $ingredient . "</p>";
    			}
				?>
			</aside>
			<main>
				<h3>Instructions:</h3>
				<?php 
    			$xml = simplexml_load_file('xml/recipe.xml');
    			foreach ($xml->recipe[1]->recipetext->li as $recipetext) {
    				echo "<p>" . $recipetext . "</p>";
    			}
				?>
			</main>
			<aside id="comments">
				<h3>Comments:</h3>
				<?php
				include 'fragments/commentForm.php';
				$recipe = 'pancakes'; 
				include 'submitComment.php';
				include 'readComment.php';
				?>
			</aside>
		</div>
		<?php 
			include 'fragments/footer.php';
		?>
	</body>
</html>