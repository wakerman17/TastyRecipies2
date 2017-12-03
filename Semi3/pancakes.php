<?php
/*
 * Shows the Pancakes page view.
 */
require_once './resources/fragments/init.php';
header("Cache-Control: max-age=1200");
include TASTY_RECIPES_VIEWS . 'pancakesView.php';