<?php

date_default_timezone_set("Asia/Ho_Chi_Minh");

define('MAIN_PATH', dirname(__FILE__));

define('APP_PATH', MAIN_PATH . DIRECTORY_SEPARATOR . 'app');

define('CORE_PATH', MAIN_PATH . DIRECTORY_SEPARATOR . 'core');

define('RESOURCE_PATH', MAIN_PATH . DIRECTORY_SEPARATOR . 'resources');

require_once MAIN_PATH . DIRECTORY_SEPARATOR . 'core/index.php';