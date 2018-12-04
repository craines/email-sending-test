<?php

define('ROOT_PATH', dirname(__FILE__));

//Load Composer's autoloader
require ROOT_PATH.'/vendor/autoload.php';

return require_once "./routes/web.php";
