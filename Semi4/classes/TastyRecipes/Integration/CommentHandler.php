<?php

namespace TastyRecipes\Integration;

class CommentHandler {
    
    /**
     * Insert a comment to the database.
     * @param String $commenterUsername The user's username.
     * @param String $commentText The user's text in the commentform.
     * @param String $recipe Which recipe website the user are.
     * @return String A message that shows the comment was submitted ok.
     */
    public function insertComment($username, $commentText, $time, $recipe) {
        return $this->insertCommentPrivate ($username, $commentText, $time, $recipe);
    }
    
    /**
     * Delete a specified comment.
     * @param type $time The time the user submitted the comment.
     * @param String $recipe Which recipe website the user are.
     */
    public function deleteComment($time, $recipe){
        return $this->deleteCommentPrivate($time, $recipe);
    }
    
    /**
     * Export all the comments for this recipe.
     * @param String $recipe Which recipe website the user are.
     * @return Array An array with all the comments
     */
    public function getComments($recipe, $newestTimesubmitted) {
        return $this->getCommentsPrivate($recipe, $newestTimesubmitted);
    }
    
    /**
     * Validate a comment to make sure it's secure to insert it into a database.
     * @param String $commentText The user's text in the commentform.
     * @return String A String that can be inserted into a database.
     */
    public function validateComment($commentText) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
        $mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if ($mysqli->connect_errno) {
            return "Error";
        }
        $escapedString = $mysqli->real_escape_string($commentText);
        $specialCharacters1 = array("\'", '\"', '\\\\');
        $specialCharacters2 = array("'", '"', '\\');
        return \str_replace($specialCharacters1, $specialCharacters2, $escapedString);
    }
    
    private function insertCommentPrivate($username, $commentText, $time, $recipe) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if(!($statment = $mysqli->prepare("INSERT INTO " . $recipe . " (Username, Comment, TimeSubmitted) VALUES (?,?,?);"))) {
            
            echo "prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "\n" . '$recipe = ' . $recipe . "\n";
            return FALSE;
        }
        else {
            $statment->bind_param("sss", $username, $commentText, $time);
            if (!($statment->execute())) {
                //echo "execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
                return FALSE;
            } else {
                //echo "Success!";
                return TRUE; 
            }
        }
        //$statment->close();
	$mysqli->close();
     }
     
     private function deleteCommentPrivate($time, $recipe){
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if ($mysqli->connect_errno) {
            //echo"<script>console.log('0')</script>";
            return FALSE;
        }
        if (!($statment = $mysqli->prepare("DELETE FROM $recipe WHERE TimeSubmitted =?;"))){
            echo"<script>console.log('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error')</script>";
            return FALSE; 
            //echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
            $statment->bind_param("s", $time);
            if (!($statment->execute())) {
                //echo"<script>console.log('2')</script>";
                return FALSE; 
                //echo "execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
                //echo"<script>console.log('3')</script>";
                return TRUE; 
                //echo '<meta http-equiv="refresh" content="0">';
            }
        }
        $statment->close();
        $mysqli->close();
     }
     
    private function getCommentsPrivate($recipe, $newestTimesubmitted) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if ($mysqli->connect_errno) {
            //echo"<script>console.log('0')</script>";
            return NULL;
        }
        if (!($statment = $mysqli->prepare("SELECT * FROM $recipe WHERE TimeSubmitted > ?;"))){
            //echo'<script>console.log("1")</script>';
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            return NULL; 
            
        } else {
            $statment->bind_param("i", $newestTimesubmitted);
            if (!($statment->execute())) {
                $statment->close();
                $mysqli->close();
                return NULL; 
                
            } else {
                //echo'<script>console.log("2")</script>';
                $result = $statment->get_result();
                return $result;
                //return TRUE; 
                //echo '<meta http-equiv="refresh" content="0">';
            }
        }
        return $mysqli->query($sql);
    }
}