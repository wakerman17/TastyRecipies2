<?php

namespace TastyRecipes\Model;

class Comment {
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
}