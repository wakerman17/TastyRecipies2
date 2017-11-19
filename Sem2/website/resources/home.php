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
			$head = 'Home';
			include 'fragments/header.php';
		?>
		<nav>
			<ul>
				<li class="navLink" id="active">Home</li>
				<li><a class="navLink" href="register.php">Register</a></li>
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
					Do you want to cook some good food? Then you've come right. In Tasty Recipes are many yummy recipes. We currently have pancakes and meatballs. <br>
					If you press on the food name in the menu above, the you directly come to it's recipe.<br> 
					If you press on Register then you can make a new account, then you can comment the recipes.<br> 
					If you press on Calender you'll see a calendar that shows what you can make during the current month.
				</p>
				
				<figure>
					<video autoplay loop>
						<source src="vid/foodPrep.mp4" type="video/mp4">
						<source src="vid/foodPrep.ogv" type="video/ogv">
						<source src="vid/foodPrep.webm" type="video/webm">
					</video>
				</figure>	
				<p>
					We are grateful that you found our recipe bank and hope you will have many new "good" moments. <br>
					Fun fact: Tasty Recipes's insigma is "Die L&ouml;wen und die b&auml;ren". 
				</p>
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