<?php
/**
 * Validates a form.
 */

require_once './resources/fragments/init.php';
$errorUser = $errorPassword = $error = "";
if ($username == "") {
    $errorUser = "Username is required";
}
if ($password == "") {
    $errorPassword = "Password is required";
}
if ($errorUser === "") {
        if ($errorPassword === "") {
            //Both filled
            if (!ctype_alnum($username) OR !ctype_alnum($password)) {
                $error = "Only letters and digits allowed!";
            } else {
                $passed = TRUE;
            }
            //Username filled
        } elseif (!ctype_alnum($username)) {
            $error = "Only letters and digits allowed!"; 
        }
    } elseif ($errorPassword === "") {
        //Password filled
        if (!ctype_alnum($password)) {
            $error = "Only letters and digits allowed!";
        }
}  