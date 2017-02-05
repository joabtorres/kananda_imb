<?php

require 'environment.php';

define("BASE_URL", "http://kananda.imb.pc");

global $painel;
global $config;
$config = array();
if (ENVIRONMENT == 'development') {
    $config['dbname'] = 'kananda_imb';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    $config['dbname'] = 'galeria';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
}
?>