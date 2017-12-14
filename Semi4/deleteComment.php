<?php
/**
 * Make sure a comment is deleted.
 */
     
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;
    
$time = $_POST["submittedTime"];
$recipe = $_POST["recipe"];
$controller = SessionManager::getController();
$controller->deleteComment($time, $recipe);
SessionManager::storeController($controller);