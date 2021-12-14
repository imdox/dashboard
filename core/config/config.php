<?php

date_default_timezone_set('Asia/Kolkata');
//Note: This file should be included first in every php page.
error_reporting(0);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(dirname(__FILE__))));
define('APP_FOLDER', '3');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
require_once BASE_PATH.'/core/config/MysqliDb/MysqliDb.php';
/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
 */

define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "root");
define('DB_NAME', "Company");

/**
 * Get instance of DB object
 */
function getDbInstance() {
	return new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}
