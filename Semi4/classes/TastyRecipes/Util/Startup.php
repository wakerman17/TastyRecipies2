<?php
namespace TastyRecipes\Util;
    
/**
 * Responsible for initialization common to different requests.
 */
class Startup {
    public const CONST_PREFIX = 'TASTY_RECIPES_';
            
    /**
     * Performs all initialization that must be done before request handling starts.
     */
    public static function initRequest() {
        self::createConstants();
        session_start();
        self::createClassLoader();
    }
            
    private static function createConstants() {
        self::createConstant('VIEWS', 'resources/views/');
        self::createConstant('FRAGMENTS', 'resources/fragments/');
        self::createConstant('META', 'resources/meta/');
        self::createConstant('CSS', 'resources/css/');
        self::createConstant('JS', 'resources/js/');
    }
            
    private static function createConstant($name, $value) {
	define(self::CONST_PREFIX . $name, $value);
    }
            
    private static function createClassLoader() {
        spl_autoload_register(function ($className) {
            require_once 'classes/' . \str_replace('\\', '/', $className) . '.php';
	});
    }
}