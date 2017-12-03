<?php

namespace TastyRecipes\Model;

class Cacher {
    
    /**
     * This method is unused. It takes the arguments and writes a 304 or 200 header.
     * @param String $file The name of the current file.
     * @param String $timestamp When the current file was edited.
     */
    function caching_headers ($file, $timestamp) {
        $gmt_mtime = gmdate('r', $timestamp);
        header('ETag: "' . md5($timestamp . $file) . '"');
        header('Last-Modified: ' . $gmt_mtime);
        header('Cache-Control: public');

        if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) || isset($_SERVER['HTTP_IF_NONE_MATCH'])) {
            if ($_SERVER['HTTP_IF_MODIFIED_SINCE'] == $gmt_mtime || str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == md5($timestamp . $file)) {
                header('HTTP/1.1 304 Not Modified');
                exit();
            }
            
        }
    }
}

/*
This is how I tried to call the method from a file that only shows a webpage:

use TastyRecipes\Controller\SessionManager;
$controller = SessionManager::getController();
$login = "D:\HTMLprogram\ID1354\UniServerZ\www\Semi3\login.php";
//$controller->caching_headers ($login, filemtime($login));
//echo "[" . $_SESSION["username"] . "]";
if(!isset($_SESSION["loginchang"])) {
    $_SESSION["loginchang"] = 0;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION["loginchang"] = $_SESSION["loginchang"] + 1;
    $byte = serialize($_SESSION["loginchang"]);
} else {
    $_SESSION["loginchang"] = unserialize($byte);
}
$controller->caching_headers (__FILE__, filemtime(__FILE__), $_SESSION["username"]);
echo $_SESSION["loginchang"];
SessionManager::storeController($controller);
*/