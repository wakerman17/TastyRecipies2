<?php
/*
 * Shows the Register page view.
 */
require_once './resources/fragments/init.php';
header("Cache-Control: max-age=1200");
include TASTY_RECIPES_VIEWS . 'registerView.php';