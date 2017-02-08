<?php

require 'environment.php';


global $painel;
global $config;
$config = array();
if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://kananda.imb.pc");
    $config['dbname'] = 'kananda_imb';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://kananda.imb.br");
}
?>