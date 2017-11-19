<?php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Tasty Recipes Home</title>
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "css/reset.css" />
		
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "css/common.css" />
			
		<link 	rel = "stylesheet"
				type = "text/css"
				href = "css/home.css" />
	</head>
	<body>
		<?php
			$head = 'Register';
			include 'fragments/header.php';
		?>
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
				<h3>
					Find us on Social medias
				</h3>
				<ol>
					<li>
						<a href="https://sv-se.facebook.com/">
							Facebook
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/">
							YouTube
						</a>
					</li>
					<li>
						<a href="https://twitter.com/?lang=sv">
							Twitter
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/">
							Instagram
						</a>
					</li>
					<li>
						<a href="https://www.tumblr.com/">
							Tumblr
						</a>
					</li>
					<li>
						<a href="https://vimeo.com/">
							Vimeo
						</a>
					</li>
					<li>
						<a href="https://se.linkedin.com/">
							Linkedln
						</a>
					</li>
				</ol>
			</aside>
			<main>
				<p>
					In the boxes below you shall write your specific information you want in relation to the information asked for.<br>
				</p>
				<?php
				include 'registerProcess.php';
				?>
				<form method="post">
					Username: <input type="text" name="usernameRegister"> <?php echo $registerErrorUsern;?><br>
   					Password: <input type="password" name="passwordRegister"> <?php echo $registerErrorPassword;?><br>
    				<input type="submit" name="register" value="Register" class="button" id="registerButton">
				</form>
			</main>
			<aside id="news">
				<h3>
					News
				</h3>
				<p>
					Now you can log in to the site, then you can comment the recipies. 
				</p>	
			</aside> 
		</div> 
		<?php 
			include 'fragments/footer.php';
		?>
	</body>
</html>