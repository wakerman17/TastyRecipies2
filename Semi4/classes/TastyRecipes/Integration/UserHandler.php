<?php

namespace TastyRecipes\Integration;

use TastyRecipes\Model\User;

class UserHandler {
    
    /**
     * Search for the arguments in the database for a login
     * @param String $username The user's username.
     * @param String $password The user's password.
     * @return String A message if the username is made or not, "Hit" if found.
     */
    public function getUsernamePassword($username){
        return $this->getUsernamePasswordPrivate($username);
    }
    
    /**
     * Check how many of this $username is created.
     * @param String $username The username the user have written.
     * @param String $password The password the user have written.
     * @return int The amount of users with this $username.
     */
    public function checkAmount($username, $password) {
        return $this->checkAmountPrivate($username, $password);
    }
    
    /**
     * Insert a usert into the database.
     * @param String $username The username the user have written.
     * @param String $password The password the user have written.
     * @return String A message if the user could be inserted or not, and if not why.
     */
    public function insertUserToDatabase ($username, $password) {
        return $this->insertUserToDatabasePrivate($username, $password);
    }
   
    private function getUsernamePasswordPrivate($username) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'login');
        if ($mysqli->connect_errno) {
            return "Error";
        }
        $username = $mysqli->real_escape_string($username);
        if(!($statment = $mysqli->prepare("SELECT Password FROM user WHERE Username=?;"))) {
            return "Error";
        } else { 
            $statment->bind_param("s", $username);
            $statment->execute();
            $statment->bind_result($hash);
            while ($statment->fetch()) {
                $mysqli->close();
                return $hash;
            }
        }
    }
    
    private function checkAmountPrivate($username, $password) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'login');
        if ($mysqli->connect_errno) {
            return "Error";
        }
        $username = $mysqli->real_escape_string($username);
	$password = $mysqli->real_escape_string($password);
        if(!($statment = $mysqli->prepare("SELECT * FROM user WHERE Username=?;"))) {
            $statment->close;
            $mysqli->close;
            return "Error";
        } else {
            $statment->bind_param("s", $username);
            $statment->execute();
            $statment->store_result();
            $statment->close;
            $mysqli->close;
            return $statment->num_rows;
        }
    }
    
    private function insertUserToDatabasePrivate ($username, $password) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'login');
        if ($mysqli->connect_errno) {
            return "Error";
        }
        if (!($statment = $mysqli->prepare("INSERT INTO user (Username, Password) VALUES (?,?)"))) {
            return "Error";
            //echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
            $statment->bind_param("ss", $username, $password);
            if($statment->execute() === TRUE) {
                $statment->close;
                $mysqli->close;
                return "Success";
            } else {
                $statment->close();
                $mysqli->close();
                return "Error";
            }
        }
    }
}