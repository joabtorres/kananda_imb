<?php

session_start();
require 'config.php';

spl_autoload_register(function ($class) {
    global $painel;
    if ($painel) {
        if (strpos($class, 'Controller') > -1) {
            if (file_exists('controllers/painel_admin/' . $class . '.php')) {
                require_once 'controllers/painel_admin/' . $class . '.php';
            }
        } elseif (file_exists('models/painel_admin/' . $class . '.php')) {
            require_once 'models/painel_admin/' . $class . '.php';
        } elseif (file_exists('core/' . $class . '.php')) {
            require_once 'core/' . $class . '.php';
        }
    } else {
        if (strpos($class, 'Controller') > -1) {
            if (file_exists('controllers/' . $class . '.php')) {
                require_once 'controllers/' . $class . '.php';
            }
        } elseif (file_exists('models/' . $class . '.php')) {
            require_once 'models/' . $class . '.php';
        } elseif (file_exists('core/' . $class . '.php')) {
            require_once 'core/' . $class . '.php';
        }
    }
});

$core = new Core();
$core->run();
?>