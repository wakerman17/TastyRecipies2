<?php 
/**
 * Make sure the user can read the comments.
 */
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;

$controller = SessionManager::getController();
$recipe = $_GET['recipe'];
$newestTimesubmitted = $_GET['newestTimesubmitted'];
$jsonData = $controller->exportComments($recipe, $newestTimesubmitted);
SessionManager::storeController($controller);
echo \json_encode($jsonData);
return TASTY_RECIPES_VIEWS . "jsonView";