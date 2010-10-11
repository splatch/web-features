<?php

require('c:/xampp/php/PEAR/agavi/agavi.php');

require('./app/config.php');

require_once('./libs/Doctrine.php');

spl_autoload_register(array('Doctrine', 'autoload'));

$conn = Doctrine_Manager::connection(AgaviConfig::get('doctrine.dsn'), 'doctrine');
$conn->setOption('username', AgaviConfig::get('doctrine.username'));
$conn->setOption('password', AgaviConfig::get('doctrine.password'));

Doctrine_Manager::getInstance()->setAttribute('model_loading', 'conservative');

$config = array(
  'data_fixtures_path' => AgaviConfig::get('doctrine.data_fixtures_path'),
  'models_path' => AgaviConfig::get('doctrine.models_path'),
  'migrations_path' => AgaviConfig::get('doctrine.migrations_path'),
  'sql_path' => AgaviConfig::get('doctrine.sql_path'),
  'yaml_schema_path' => AgaviConfig::get('doctrine.yaml_schema_path')
);

$cli = new Doctrine_Cli($config);
$cli->run($_SERVER['argv']);

?>
