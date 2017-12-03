<?php
/**
 * Make sure the comment is submitted.
 */
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;
$commentMessage = $commentError = "";
if (!empty($_POST['commentText'])) {
	$controller = SessionManager::getController();
	$commentMessage = $controller->insertComment($controller->getUsername(), $_POST['commentText'], $recipe);
        SessionManager::storeController($controller);
} elseif (isset($_POST['commentButton'])) {
	$commentError = "Please write something<br><br>";
}