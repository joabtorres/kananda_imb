<?php

require 'environment.php';

define("BASE_URL", "http://kananda.imb.pc/");

global $config;
$config = array();
if (ENVIRONMENT == 'development') {
    $config['dbname'] = 'galeria';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
} else {
    $config['dbname'] = 'galeria';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
}
?>