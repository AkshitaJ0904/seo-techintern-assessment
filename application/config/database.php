<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Get the database URL from environment variables
$db_url = getenv('MYSQL_URL') ?: 'mysql://root:eBBazdhuCQD1drrVvCoRuJCNjmzTBbXO@trolley.proxy.rlwy.net:13292/railway';

// Parse the database URL
$parsed_url = parse_url($db_url);

$db['default'] = array(
    'dsn'      => '',
    'hostname' => isset($parsed_url['host']) ? $parsed_url['host'] : 'trolley.proxy.rlwy.net',
    'username' => isset($parsed_url['user']) ? $parsed_url['user'] : 'root',
    'password' => isset($parsed_url['pass']) ? $parsed_url['pass'] : 'eBBazdhuCQD1drrVvCoRuJCNjmzTBbXO',
    'database' => isset($parsed_url['path']) ? trim($parsed_url['path'], '/') : 'railway',
    'port'     => isset($parsed_url['port']) ? $parsed_url['port'] : '13292',
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
