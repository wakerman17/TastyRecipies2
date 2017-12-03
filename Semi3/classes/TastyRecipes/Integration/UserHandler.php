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
    public function serchUserInfo($username, $password){
        return$this->serchUserInfoPrivate($username, $password);
    }
    
    /**
     * Insert the user if possible to the database.
     * @param String $username The user's username.
     * @param String $password The user's password.
     * @return boolean TRUE if the insertion was made FALSE otherwise.
     */
    public function insertUser($username, $password) {
        return $this->possibleToInsertUser($username, $password);
    }
    
    private function serchUserInfoPrivate($username, $password){
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'login');
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $username = $mysqli->real_escape_string($username);
	$password = $mysqli->real_escape_string($password);
        $statment = $mysqli->prepare("SELECT Password FROM user WHERE Username=?;");
        if($statment == TRUE) { 
            $statment->bind_param("s", $username);
            $statment->execute();
            $statment->store_result();
            $statment->bind_result($hash);
            $mysqli->close();
            if ($statment->num_rows == 1) {
                $row = $statment->fetch();
                if (password_verify($password, $hash)) {
                    return "Hit";
                } else {
                    return "The username $username is made.";
                }
            } else {
                return "The account with the username $username weren't found.";
            }
        } else {
            $error = $mysqli->errno . ' ' . $mysqli->error;
            echo $error; 
        }
    }
    
    private function possibleToInsertUser($username, $password) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'login');
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $username = $mysqli->real_escape_string($username);
	$password = $mysqli->real_escape_string($password);
        $statment = $mysqli->stmt_init();
        $statment = $mysqli->prepare("SELECT * FROM user WHERE Username=?;");
        if($statment === FALSE) {
            $error = $mysqli->errno . ' ' . $mysqli->error;
            echo $error . "Error!";
            $statment->close;
            $mysqli->close;
        } else {
            $statment->bind_param("s", $username);
            $statment->execute();
            $statment->store_result();
            if ($statment->num_rows > 0) {
                $statment->close;
                $mysqli->close;
                return FALSE;
            } else {
                return $this->insertUserToDatabase($username, $password, $mysqli);
            }
        }
    }
    
    private function insertUserToDatabase ($username, $password, $mysqli) {
        if (!($statment = $mysqli->prepare("INSERT INTO user (Username, Password) VALUES (?,?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
            $statment->bind_param("ss", $username, $password);
            if($statment->execute() === TRUE) {
                $statment->close;
                $mysqli->close;
                return TRUE;
            } else {
                $error = $mysqli->error . ' ' . $mysqli->error;
                echo $error;
                $statment->close();
                $mysqli->close();
            }
        }
    }
}