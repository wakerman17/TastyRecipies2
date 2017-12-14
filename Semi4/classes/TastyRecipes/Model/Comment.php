<?php
    
namespace TastyRecipes\Model;
    
use TastyRecipes\Integration\CommentHandler;
    
class Comment implements \JsonSerializable {
    private $commenterUsername;
    private $commentText;
    private $timeSubmitted;
            
    /**
     * Create a new instance of TastyRecipes\Model\Comment.
     * @param String $commenterUsername The user's username.
     * @param String $commentText The user's text in the commentform.
     */
    public function __construct($commenterUsername, $commentText) {
        $this->commenterUsername = $commenterUsername;
        $this->commentText = $commentText;
        $this->timeSubmitted = strtotime("now");
    }
            
    /**
     * Get this commenter's username.
     * @return String This commenter's username.
     */
    public function getUsername () {
        return $this->commenterUsername;
    }
            
    /**
     * Get the text in this comment.
     * @return String The text in this comment.
     */
    public function getComment () {
        return $this->commentText;
    }
            
    /**
     * Get the time this comment was submitted.
     * @return String The time this comment was submitted.
     */
    public function getTime () {
        return $this->timeSubmitted;
    }
            
    /**
     * Create a JSON representation of this object.
     * 
     * @return \StdClass An object of an anonymous class that contains the 'commenterUsername', 'commentText' 
     *                   and 'timeSubmitted' properties of this object and can be encoded with \json_encode. 
     */
    public function jsonSerialize() {
        $json_obj = new \stdClass;
        $json_obj->commenterUsername = \json_encode($this->commenterUsername);
        $json_obj->commentText = \json_encode($this->commentText);
        $json_obj->timeSubmitted = \json_encode($this->timeSubmitted);
        return $json_obj;
    }
}