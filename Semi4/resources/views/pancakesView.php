<!doctype html>
<html lang="en">
    <head>
        <title>Tasty Recipes Pancakes</title>
        <?php include TASTY_RECIPES_FRAGMENTS . 'css.php'; ?>
        <link 	rel = "stylesheet"
                type = "text/css"
                href = "<?php echo TASTY_RECIPES_CSS ?>recipe.css" />
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
        <script type="text/javascript" 
                src="<?php echo TASTY_RECIPES_JS ?>TastyRecipes.js" async></script>
    </head>
    <body>
        <header>
            <?php
            $head = 'Pancakes';
            $page = 'pancakes.php';
            include TASTY_RECIPES_FRAGMENTS . 'header.php';
            ?>
        </header>
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
            <?php 
            $recipeNumber = 1;
            $recipeName = "pancakes";
            include TASTY_RECIPES_FRAGMENTS . 'recipeInformation.php';
            ?>
            <aside id="comments">
		<?php
		$recipe = 'pancakes';
		include TASTY_RECIPES_FRAGMENTS . 'recipeAsideRight.php';
		?>
            </aside>
        </div>
        <footer>
            <?php include TASTY_RECIPES_FRAGMENTS . 'footer.php';?>
        </footer>
    </body>
</html>