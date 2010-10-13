<?php
// Doctrine configuration file - only for command line usage.

$classLoader = new \Doctrine\Common\ClassLoader('WebFeatures', 'app');
$classLoader->register();

$config = new Doctrine\ORM\Configuration(); // (2)

$config->setProxyDir('.');
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true);

$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/app/config/mapping");
$config->setMetadataDriverImpl($driverImpl);

$cache = new Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

$conn = array(
    'dbname' => 'webfeatures',
    'user' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'driver' => 'pdo_pgsql',
);

$evm = new Doctrine\Common\EventManager();
$entityManager = Doctrine\ORM\EntityManager::create($conn, $config, $evm);

$db = new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection());
$em = new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager);

$helper = new Symfony\Component\Console\Helper\HelperSet(array(
	'db' => $db,
	'em' => $em,
));

?>