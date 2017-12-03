<?php ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Tasty Recipes Register</title>
		<?php 
		include TASTY_RECIPES_FRAGMENTS . 'css.php';
		?>
                <link 	rel = "stylesheet"
                        type = "text/css"
                        href = "resources/css/main.css" />
	</head>
	<body>
		<header>
		<?php
		$head = 'Register';
		include TASTY_RECIPES_FRAGMENTS . 'header.php';
		?>
		</header>
		<nav>
			<ul>
				<li><a class="navLink" href="home.php">Home</a></li>
				<li class="navLink" id="active">Register</li>
				<li><a class="navLink" href="calendar.php">Calendar</a></li>
				<li><a class="navLink" href="meatballs.php">Meatballs</a></li>
				<li><a class="navLink" href="pancakes.php">Pancakes</a></li>
			</ul>
		</nav>
		<div id="middle">
			<aside id="SN">
				<?php
				include TASTY_RECIPES_FRAGMENTS . 'mainAsideLeft.php';
				?>
			</aside>
			<main>
				<p>
					In the boxes below you shall write your specific information you want in relation to the information asked for.<br>
				</p>
				<?php
				include 'registerProcess.php';
				?>
				<form method="post" action="">
					<?php echo "<strong>$registrerError</strong>"; ?>
					<?php echo "<p>$registerMessage</p>"; ?>
					Username: <input type="text" name="usernameRegister"> <?php echo $registerErrorUsername;?><br>
   					Password: <input type="password" name="passwordRegister"> <?php echo $registerErrorPassword;?><br>
    				<input type="submit" name="register" value="Register" class="button" id="registerButton">
				</form>
			</main>
			<aside id="news">
				<?php 
				include TASTY_RECIPES_FRAGMENTS . 'mainAsideRight.php';
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