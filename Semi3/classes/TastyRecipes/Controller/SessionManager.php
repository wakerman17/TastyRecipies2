<?php

namespace TastyRecipes\Controller;

use TastyRecipes\Controller\Controller;

class SessionManager {

    /**
     * The key for the controller object is the session storage.
     */
    const CONTROLLER_KEY = 'controller';

    /**
     * If there is a controller object in the current session, it is returned. If there is not,
     * a new controller is instantiated and returned.
     * 
     * @return \Chat\Controller\Controller the controller.
     */
    public static function getController() {
        if (isset($_SESSION[self::CONTROLLER_KEY])) {
            return unserialize($_SESSION[self::CONTROLLER_KEY]);
        } else {
            return new Controller();
        }
    }

    /**
     * The specified controller instance is stored in the current session.
     */
    public static function storeController(Controller $controller) {
        $_SESSION[self::CONTROLLER_KEY] = serialize($controller);
    }

}

