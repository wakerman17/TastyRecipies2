<?php
/**
 * Make sure the comment is submitted.
 */
require_once './resources/fragments/init.php';
$commentText = $_POST['commentText'];
$recipe = $_POST['recipe'];
use TastyRecipes\Controller\SessionManager;
if ($commentText !== "") {
    $controller = SessionManager::getController();
    $couldInsert = $controller->insertComment($controller->getUsername(), $commentText, $recipe);
    if ($couldInsert === TRUE) {
        echo "Thanks for your comment, press the button below to see it below.";
    } elseif ($couldInsert === FALSE) {
        echo "Something strange happend, try to write again";
    }
    SessionManager::storeController($controller);
}
