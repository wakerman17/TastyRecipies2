<?php

namespace TastyRecipes\Integration;

//use TastyRecipes\Model\Comment;

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
        $this->deleteCommentPrivate($time, $recipe);
    }
    
    /**
     * Export all the comments for this recipe.
     * @param String $recipe Which recipe website the user are.
     * @return Array An array with all the comments
     */
    public function exportComments($recipe) {
        return $this->exportCommentsPrivate($recipe);
    }
    
    /**
     * Validate a comment to make sure it's secure to insert it into a database.
     * @param String $commentText The user's text in the commentform.
     * @return String A String that can be inserted into a database.
     */
    public function validateComment($commentText) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
        $mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        return $mysqli->real_escape_string($commentText);
    }
    
    private function insertCommentPrivate($username, $commentText, $time, $recipe) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if(!($statment = $mysqli->prepare("INSERT INTO $recipe (Username, Comment, TimeSubmitted) VALUES (?,?,?);"))) {
            echo "prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        else {
            $statment->bind_param("sss", $username, $commentText, $time);
            if (!($statment->execute())) {
                echo "execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
                return "Thanks for your comment, see it below.<br>";
            }
        }
        $statment->close();
	$mysqli->close();
     }
     
     private function deleteCommentPrivate($time, $recipe){
             require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if (!($statment = $mysqli->prepare("DELETE FROM $recipe WHERE TimeSubmitted =?;"))){
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        } else {
            $statment->bind_param("s", $time);
            if (!($statment->execute())) {
                echo "execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
                echo '<meta http-equiv="refresh" content="0">';
            }
        }
        $statment->close();
        $mysqli->close();
     }
     
     private function exportCommentsPrivate($recipe) {
        require realpath('D:\HTMLprogram\ID1354\private\Secret.php');
	$mysqli = new \mysqli('localhost',$databaseUsername,$databasePassword,'comments');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "SELECT * FROM $recipe";
        $result = mysqli_query($mysqli, $sql);
        if ($mysqli->query($sql) === false) {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        if (mysqli_num_rows($result) > 0) {
            $result_array = array();
            while($row = mysqli_fetch_assoc($result)) {
                $result_array[] = $row;
            }
            return $result_array;
        }
    }
}