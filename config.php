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
    define("BASE_URL", "http://dev.kananda.imb.br");
    $config['dbname'] = 'endog103_kananda_dev';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'endog103_ka_imb';
    $config['dbpass'] = 'dK.V{zA14vAM';
}
?>