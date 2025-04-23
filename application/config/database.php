<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Parse the DATABASE_URL environment variable if it exists
$database_url = getenv('DATABASE_URL');
if ($database_url) {
    $url_parts = parse_url($database_url);
    $db['default'] = array(
        'dsn'      => '',
        'hostname' => $url_parts['host'] ?? 'trolley.proxy.rlwy.net',
        'username' => $url_parts['user'] ?? 'root',
        'password' => $url_parts['pass'] ?? 'eBBazdhuCQD1drrVvCoRuJCNjmzTBbXO',
        'database' => ltrim($url_parts['path'] ?? '/railway', '/'),
        'port'     => $url_parts['port'] ?? '13292',
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
    // Fallback to hardcoded values if DATABASE_URL is not available
    $db['default'] = array(
        'dsn'      => '',
        'hostname' => 'trolley.proxy.rlwy.net',
        'username' => 'root',
        'password' => 'eBBazdhuCQD1drrVvCoRuJCNjmzTBbXO',
        'database' => 'railway',
        'port'     => '13292',
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
}
