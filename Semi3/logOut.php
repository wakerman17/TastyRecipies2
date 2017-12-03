<?php
/**
 * The log out process.
 */
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;

if(isset($_POST['log_out'])){
    $controller = SessionManager::getController();
    $controller->unsetUsername();
    //echo "[" . $controller->getUsername();
    SessionManager::storeController($controller);
    unset($_SESSION['username']);
    unset($_POST['log_in']);
    $msg = "Logged out";
}