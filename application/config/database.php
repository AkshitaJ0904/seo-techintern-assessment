<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Try using the environment variables directly
$db['default'] = array(
    'dsn'      => '',
    'hostname' => getenv('MYSQLHOST') ?: 'trolley.proxy.rlwy.net',
    'username' => getenv('MYSQLUSER') ?: 'root',
    'password' => getenv('MYSQLPASSWORD') ?: 'eBBazdhuCQD1drrVvCoRuJCNjmzTBbXO',
    'database' => getenv('MYSQL_DATABASE') ?: 'railway',
    'port'     => getenv('MYSQLPORT') ?: '13292',
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
    'save_queries' => TRUE,
    'socket'   => '' // Make sure this is empty to force TCP/IP connection
);
