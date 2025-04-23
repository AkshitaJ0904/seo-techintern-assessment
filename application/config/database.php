<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'mysql.railway.internal',  // From MYSQLHOST
    'username' => 'root',                    // From MYSQLUSER
    'password' => 'eBBazdhuCQD1drrVvCoRuJCNjmzTBbXO', // From MYSQLPASSWORD
    'database' => 'railway',                 // From MYSQL_DATABASE
    'port'     => '3306',                    // From MYSQLPORT
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
