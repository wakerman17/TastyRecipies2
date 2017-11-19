<?php 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
</head>	
<body>
	<header>
		<img class="start" src="img/orange.jpeg" alt="orange">
		<img class="start" src="img/kiwi.jpeg" alt="kiwi">
		<a href="home.php"><img class="start" id="logo" src="img/logo.jpeg" alt="logo"></a>
		<img class="start" src="img/strawberry.jpeg" alt="strawberry">
		<img class="start" src="img/raspberry.jpeg" alt="raspberry">

		<h1>
			Tasty Recipes
		</h1>
		<?php 
		echo "<h2>$head</h2>"; 
		include 'login.php';
		?>
	</header>
</body>
</html>