<?php
/*
 * Shows the Meatballs page view.
 */
require_once './resources/fragments/init.php';
header("Cache-Control: max-age=1200");
include TASTY_RECIPES_VIEWS . 'meatballsView.php';