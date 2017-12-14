<?php
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;

$controller = SessionManager::getController();
$username = $controller->getUsername();
return TASTY_RECIPES_VIEWS . "jsonView";