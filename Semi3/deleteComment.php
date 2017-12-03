<?php
/**
 * Make sure a comment is deleted.
 */

require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;

if (isset($_POST["delete"])) {
    $time = $_POST["submittedTime"];
    $controller = SessionManager::getController();
    $controller->deleteComment($time, $recipe);
    SessionManager::storeController($controller);
}