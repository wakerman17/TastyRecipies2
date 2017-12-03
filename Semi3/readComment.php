<?php 
/**
 * Make sure the user can read the comments.
 */
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;

$controller = SessionManager::getController();
$result_array = $controller->exportComments($recipe);