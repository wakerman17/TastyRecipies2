<?php

namespace TastyRecipes\Controller;

use TastyRecipes\Util\Startup;
use TastyRecipes\Integration\CommentHandler;
use TastyRecipes\Integration\UserHandler;
use TastyRecipes\Model\Comment;
use TastyRecipes\Model\User;
use TastyRecipes\Model\Cacher;

/**
 * This is the application's controller. All calls from the view pass through here.
 */
class Controller {
	private $user;
        private $cacher;
	private $comment;
	private $commentHandler;
        private $userHandler;
	
	/**
         * Creates a new instance of TastyRecipes\Controller\Controller.
         */
	public function __construct() {
		$this->user = New User();
                $this->cacher = New Cacher();
		$this->commentHandler = New CommentHandler();
		$this->userHandler = New UserHandler();
	}
        /**
         * This method is unused. It takes the arguments and writes a 304 or 200 header.
         * @param String $file The name of the current file.
         * @param String $timestamp When the current file was edited.
         */
        public function caching_headers($file, $timestamp) {
            $this->cacher->caching_headers($file, $timestamp);
        }
	
	/**
	 * Stores the user's username.
	 * @param string $username The user's username.
	 */
	public function setUsername($username) {
		$this->user->setUsername($username);
	}
        
        /**
         * Remove the username for this user.
         */
        public function unsetUsername() {
		$this->user->unsetUsername();
	}
        
        /**
         * Search for the arguments in the database for a login
         * @param String $username The user's username.
         * @param String $password The user's password.
         * @return String A message if the username is made or not, "Hit" if found.
         */
        public function serchUserInfo($username, $password){
           return $this->userHandler->serchUserInfo($username, $password);
        }
        
        /**
         * Insert the user if possible to the database.
         * @param String $username The user's username.
         * @param String $password The user's password.
         * @return boolean TRUE if the insertion was made FALSE otherwise.
         */
        public function insertUser($username, $password){
            return $this->userHandler->insertUser($username, $password);
        }
	
	/**
	 * @return string The user's nick name.
	 */
	public function getUsername() {
		return $this->user->getUsername();
	}
	
        /**
         * Insert a comment to the database.
         * @param String $commenterUsername The user's username.
         * @param String $commentText The user's text in the commentform.
         * @param String $recipe Which recipe website the user are.
         * @return String A message that shows the comment was submitted ok.
         */
	public function insertComment($commenterUsername, $commentText, $recipe) {
                $commentText = $this->commentHandler->validateComment($commentText);
                $commentObject = $this->comment = new Comment($commenterUsername, $commentText);
		$time = $commentObject->getTime();
		return $this->commentHandler->insertComment($commenterUsername, $commentText, $time, $recipe);
	}
        
        /**
         * Export all the comments for this recipe.
         * @param String $recipe Which recipe website the user are.
         * @return Array An array with all the comments
         */
        public function exportComments($recipe) {
            return $this->commentHandler->exportComments($recipe);
         }
        
        /**
         * Delete a specified comment.
         * @param type $time The time the user submitted the comment.
         * @param String $recipe Which recipe website the user are.
         */
        public function deleteComment($time, $recipe){
             $this->commentHandler->deleteComment($time, $recipe);
         }
}