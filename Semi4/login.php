<?php
/**
 * The login process.
 */
require_once './resources/fragments/init.php';
use TastyRecipes\Controller\SessionManager;
$loginErrorUser = $loginErrorPassword = $loginError = $passed = "";
$logged_in = FALSE;
include 'logOut.php';
//New login
if(isset($_POST['log_in'])){
    $username = $_POST["usernameLogin"];
    $password = $_POST["passwordLogin"];
    include 'formValidation.php';
    if ($passed === TRUE) {
        $controller = SessionManager::getController();
        $loginResult = $controller->loginProcess($username, $password);
        if ($loginResult == "Hit") {
            $_SESSION["username"] = $username;
            $controller->setUsername($username);
            SessionManager::storeController($controller);
            include TASTY_RECIPES_FRAGMENTS . 'loggedIn.php';
            $logged_in = TRUE;
        } elseif($loginResult == "Found")  {
            $loginError = "The username $username is made.";
            include TASTY_RECIPES_FRAGMENTS . "loginForm.php";
        } elseif($loginResult == "Miss") {
            $loginError = "The account with the username $username weren't found.";
            include TASTY_RECIPES_FRAGMENTS . "loginForm.php";
        } elseif($loginResult == "Error") {
            $loginError = "Something strange happend, try to write again";
        }
    } else {
        $loginErrorUser = $errorUser;
        $loginErrorPassword = $errorPassword;
        $loginError = $error;
        include TASTY_RECIPES_FRAGMENTS . "loginForm.php";
    }
    //login between pages
} elseif (isset($_SESSION["username"])) {
    include TASTY_RECIPES_FRAGMENTS . 'loggedIn.php';
    $logged_in = TRUE;
} 
//when logged out or when access a page already logged out
elseif ($logged_in === FALSE) {
    include TASTY_RECIPES_FRAGMENTS . "loginForm.php";
}