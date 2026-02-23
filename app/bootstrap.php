<?php
// helpers
require_once "helpers/functions.php";
// config
require_once "config/config.php";


// libs
// require_once "libraries/Controller.php";
// require_once "libraries/Core.php";
// require_once "libraries/Database.php";

// autoloader for libs
spl_autoload_register(function($className) {
    require_once "libraries/" . $className . ".php";
});

