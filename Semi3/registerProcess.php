<?php
/**
 * The register process.
 */
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;

$errorUser = $errorPassword = $registerMessage = $passed = "";
if (isset($_POST["register"])) {
    $username = $_POST["usernameRegister"];
    $password = $_POST["passwordRegister"]; 
    include 'formValidation.php';
    $registerErrorUsername = $errorUser;
    $registerErrorPassword = $errorPassword;
    $registrerError = $error;
    if ($passed === TRUE) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $controller = SessionManager::getController();
        $registerResult = $controller->insertUser($username, $password);
        if ($registerResult == TRUE) {
            $registerMessage = "Thanks, now a new account with the username " . $username ." is created!<br>";
        } else {
            $registrerError = "Another account already has the username $username";
        }
        SessionManager::storeController($controller);
    } else {
        unset($errorUser);
    }
}