<figure>
	<img src=<?php echo "resources/meta/" . $recipeName . ".jpg";?> alt=<?php echo $recipeName;?>>
</figure>
<aside id="ingredients">
    <h3>Ingredients for <?php
    $xml = simplexml_load_file('resources/meta/recipe.xml');
    echo $xml->recipe[$recipeNumber]->quantity; ?> servings</h3>
    <?php 
    $xml = simplexml_load_file('resources/meta/recipe.xml');
    foreach ($xml->recipe[$recipeNumber]->ingredient->li as $ingredient) {
    	echo "<p>" . $ingredient . "</p>";
    }
    ?>
</aside>
<main>
    <h3>Instructions:</h3>
    <?php 
    $xml = simplexml_load_file('resources/meta/recipe.xml');
    foreach ($xml->recipe[$recipeNumber]->recipetext->li as $recipetext) {
    	echo "<p>" . $recipetext . "</p>";
    }
    ?>
</main>