<?php

namespace TastyRecipes\Model;

class User {
	private $username;
	
/*	public function __construct($userName) {
		$this->$userName = $userName;
		echo $userName;
	}*/
	
	/**
	 * Stores the user's nick name.
	 * @param string $username The author's userName.
	 */
	public function setUsername($username) {
		$this->username = $username;
	}
        
        /**
         * Remove the username for this user.
         */
        public function unsetUsername() {
		$this->username = "";
	}
	
	/**
	 * @return string The author's userName.
	 */
	public function getUsername() {
		return $this->username;
	}
}