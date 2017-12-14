<?php

namespace TastyRecipes\Model;

class User implements \JsonSerializable {
    private $username;
	
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
    
    /**
     * Create a JSON representation of this object.
     * 
     * @return \StdClass An object of an anonymous class that contains the 'username' property 
     *                   of this object and can be encoded with \json_encode. 
     */
    public function jsonSerialize() {
        $json_obj = new \stdClass;
        $json_obj->username = \json_encode($this->username);
    }

}