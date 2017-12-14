<?php

namespace TastyRecipes\Model;

use TastyRecipes\Integration\UserHandler;

class OperateUser {
    
    private $userHandler;
    
    /**
     * Creates a new instance of OperateUser.
     */
    public function __construct() {
		$this->userHandler = New UserHandler();
    }
    
    /**
     * Match the hashed password and the password written.
     * @param String $hash The hashed version of the password.
     * @param String $password The password the user have written.
     * @return String A message if the user was logged in or not, and if not why.
     */
    public function passwordMatch($hash, $password) {
        if (!is_null($hash)) {
            if (password_verify($password, $hash)) {
                return "Hit";
            } else {
                return "Found";
            }
        } elseif ($hash != "Error") {
            return "Miss";
        } else {
            return "Error";
        }
    }
    
    /**
     * Make sure there is only one user, if so the user should be inserted.
     * @param int $useramount The amount of users with with the username $username.
     * @param String $username The username the user have written.
     * @param String $password The password the user have written.
     * @return String A message if the user could be inserted or not, and if not why.
     */
    public function onlyOneUser ($useramount, $username, $password) {
        if ($useramount > 0) {
            return "Found";
        } else {
            return $this->userHandler->insertUserToDatabase ($username, $password);
        }
    }
}