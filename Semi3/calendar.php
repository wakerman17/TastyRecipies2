<?php
/*
 * Shows the Calendar page view.
 */
require_once './resources/fragments/init.php';
header("Cache-Control: max-age=1200");
include TASTY_RECIPES_VIEWS . 'calendarView.php';