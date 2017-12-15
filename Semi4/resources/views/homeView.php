<!doctype html>
<html lang="en">
    <head>
        <title>Tasty Recipes Home</title>
            <?php include TASTY_RECIPES_FRAGMENTS . 'css.php'; ?>
        <link 	rel = "stylesheet"
                type = "text/css"
                href = "<?php echo TASTY_RECIPES_CSS ?>main.css" /> 
    </head>
    <body>
        <header>
            <!-- This is a *view* - HTML markup that defines the appearance of your UI -->
            <br>
            <?php
            $head = 'Home';
            include TASTY_RECIPES_FRAGMENTS . 'header.php';
            ?>
        </header>
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
                <?php include TASTY_RECIPES_FRAGMENTS . 'mainAsideLeft.php'; ?>
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
                        <source src= "resources/meta/foodPrep.mp4" type="video/mp4">
                        <source src="resources/meta/foodPrep.ogv" type="video/ogv">
                        <source src="resources/meta/foodPrep.webm" type="video/webm">
                    </video>
                </figure>	
                <p>
                    We are grateful that you found our recipe bank and hope you will have many new "good" moments. <br>
                    Fun fact: Tasty Recipes's insigma is "Die L&ouml;wen und die b&auml;ren". 
                </p>
            </main>
            <aside id="news">
                <?php include TASTY_RECIPES_FRAGMENTS . 'mainAsideRight.php'; ?>
            </aside> 
        </div>
        <footer>
            <?php include TASTY_RECIPES_FRAGMENTS . 'footer.php'; ?>
        </footer>
    </body>
</html>
