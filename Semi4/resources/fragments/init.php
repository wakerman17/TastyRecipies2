<?php

/*
 * This code must be executed before a HTTP request can be handled.
 */

use TastyRecipes\Util\Startup;

require_once 'classes/TastyRecipes/Util/Startup.php';
Startup::initRequest();