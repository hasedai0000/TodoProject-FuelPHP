<?php

/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  Global database settings
 * -----------------------------------------------------------------------------
 *
 *  Set database configurations here to override environment specific
 *  configurations
 *
 */

return array(
  'active' => 'fuel_db',

  'default' => array(
    'type' => 'pdo',
    'connection' => array(
      'persistent' => false,
    ),
    'identifier' => '`',
    'table_prefix' => '',
    'charset' => 'utf8',
    'enable_cache' => true,
    'profiling' => true,
  ),
  // データベース名
  'fuel_db' => array(
    'type' => 'pdo',
    'connection' => array(
      'dsn' => 'mysql:host=mysql;dbname=fuel_db;charset=utf8',
      'username' => 'fuel',
      'password' => 'fuel_pass',
      'persistent' => false,
    ),
    'identifier'   => '`',
    'table_prefix' => '',
    'charset' => 'utf8',
    'enable_cache' => true,
    'profiling' => true,
  ),
);
