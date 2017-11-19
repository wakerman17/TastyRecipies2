<?php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Tasty Recipes Meatballs</title>
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "CSS/reset.css"/>
		
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "CSS/common.css"/>
			
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "CSS/recipe.css"/>
	</head>
	<body>
		<?php
		$head = 'Meatballs';
		include 'fragments/header.php';
		?>
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
			<figure>
				<img src="img/meatballs.jpg" alt="Meatballs">
			</figure>
			<aside id="ingredients">
				<h3>Ingredients for <?php 
    			$xml = simplexml_load_file('xml/recipe.xml');
    			echo $xml->recipe[0]->quantity; ?> servings</h3>
				<?php 
    			$xml = simplexml_load_file('xml/recipe.xml');
    			foreach ($xml->recipe[0]->ingredient->li as $ingredient) {
    				echo "<p>" . $ingredient . "</p>";
    			}
				?>
			</aside>
			<main>
				<h3>Instructions:</h3>
				<?php 
    			$xml = simplexml_load_file('xml/recipe.xml');
    			foreach ($xml->recipe[0]->recipetext->li as $recipetext) {
    				echo "<p>" . $recipetext . "</p>";
    			}
				?>
			</main>
			<aside id="comments">
				<h3>Comments:</h3>
				<?php
				include 'fragments/commentForm.php';
				$recipe = 'meatballs';
				if (isset($_SESSION["username"])) {
					include 'submitComment.php';
				}
				include 'readComment.php';
				?>
			</aside>
		</div>
		<?php 
			include 'fragments/footer.php';
		?>
	</body>
</html>