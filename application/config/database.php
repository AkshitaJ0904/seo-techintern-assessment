<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Get the database URL from environment variables
$db_url = getenv('MYSQL_URL');

if ($db_url) {
    // Parse the database URL
    $parsed_url = parse_url($db_url);
    
    $db['default'] = array(
        'dsn'      => '',
        'hostname' => isset($parsed_url['host']) ? $parsed_url['host'] : '',
        'username' => isset($parsed_url['user']) ? $parsed_url['user'] : '',
        'password' => isset($parsed_url['pass']) ? $parsed_url['pass'] : '',
        'database' => isset($parsed_url['path']) ? ltrim($parsed_url['path'], '/') : '',
        'port'     => isset($parsed_url['port']) ? $parsed_url['port'] : '',
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
} else {
    die('MYSQL_URL environment variable is not set. Please configure it in your Railway project.');
}
