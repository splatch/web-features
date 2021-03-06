<?php

use Doctrine\ORM\EntityManager;

class AgaviDoctrine2Database extends AgaviDatabase
{
	protected $entityManager;
	
	public function connect()
	{
		// this doesn't do anything, Doctrine is handling the lazy connection stuff
	}

	public function getResource()
	{
		return $this->connection->getDbh();
	}

	public function initialize(AgaviDatabaseManager $databaseManager, array $parameters = array())
	{
		parent::initialize($databaseManager, $parameters);
		
		$name = $this->getName();

		if (!class_exists('Doctrine\Common\ClassLoader')) {
			require_once 'Doctrine\Common\ClassLoader.php';
		}

		$classLoader = new Doctrine\Common\ClassLoader('Doctrine', '');
		$classLoader->register();

		$config = new Doctrine\ORM\Configuration();

		$config->setProxyDir('.');
		$config->setProxyNamespace('Proxy');
		$config->setAutoGenerateProxyClasses(true);

		// Mappings dir
		$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(AgaviConfig::get('core.config_dir')."/mapping");
		$config->setMetadataDriverImpl($driverImpl);

		$cache = new Doctrine\Common\Cache\ArrayCache();
		$config->setMetadataCacheImpl($cache);
		$config->setQueryCacheImpl($cache);

		// connection metadata
		$conn = array(
		    'dbname' => 'webfeatures',
		    'user' => 'root',
		    'password' => 'root',
		    'host' => 'localhost',
		    'driver' => 'pdo_pgsql',
		);

		$evm = new Doctrine\Common\EventManager();
		$this->entityManager = Doctrine\ORM\EntityManager::create($conn, $config, $evm);
		$this->connection = $this->entityManager->getConnection();

		// cool. Assign the Doctrine Manager instance

		// $this->doctrineManager = Doctrine_Manager::getInstance();

		/*
		// now we're in business. we will set up connections right away, as Doctrine is handling the lazy-connecting stuff for us.
		// that way, you can just start using classes in your code
		try {
			$dsn = $this->getParameter('dsn');
			
			if($dsn === null) {
				// missing required dsn parameter
				$error = 'Database configuration specifies method "dsn", but is missing dsn parameter';
				throw new AgaviDatabaseException($error);
			}
			
			$this->connection = $this->doctrineManager->openConnection($dsn, $name);
			// do not assign the resource here. that would connect to the database
			// $this->resource = $this->connection->getDbh();
			
			// set the context instance as a connection parameter
			$this->connection->setParam('context', $databaseManager->getContext(), 'org.agavi');
			
			// charset
			if($this->hasParameter('charset')) {
				// TODO: this will force a connection, could be done using doctrine events
				$this->connection->setCharset($this->getParameter('charset'));
			}
			
			// date format
			if($this->hasParameter('date_format')) {
				$this->connection->setDateFormat($this->getParameter('date_format'));
			}
			
			// options
			foreach((array)$this->getParameter('options') as $optionName => $optionValue) {
				$this->connection->setOption($optionName, $optionValue);
			}
			
			foreach(array(
				'manager_attributes' => $this->doctrineManager,
				'attributes' => $this->connection,
			) as $attributesKey => $attributesDestination) {
				foreach((array)$this->getParameter($attributesKey, array()) as $attributeName => $attributeValue) {
					if($is12) {
						if(!strpos($attributeName, '::')) {
							throw new AgaviDatabaseException(sprintf('For Doctrine 1.2 and newer, attribute names (and, if desired to be resolved against a constant, values) must be fully qualified, e.g. "Doctrine_Core::ATTR_VALIDATE" and "Doctrine_Core::VALIDATE_NONE". Given attribute with name "%s" in collection "%s" does not match this condition.', $attributeName, $attributesKey));
						}
						if(!defined($attributeName)) {
							throw new AgaviDatabaseException(sprintf('Unknown Attribute "%s"', $attributeName));
						}
					}
					
					// resolve from constant if possible
					if(strpos($attributeName, '::') && defined($attributeName)) {
						$attributeName = constant($attributeName);
					}
					
					// resolve from constant if possible
					if(strpos($attributeValue, '::') && defined($attributeValue)) {
						$attributeValue = constant($attributeValue);
					} elseif(ctype_digit($attributeValue)) {
						$attributeValue = (int)$attributeValue;
					}
					
					$attributesDestination->setAttribute($attributeName, $attributeValue);
				}
			}
			
			foreach((array)$this->getParameter('impls', array()) as $templateName => $className) {
				$this->connection->setImpl($templateName, $className);
			}
			
			foreach((array)$this->getParameter('manager_impls', array()) as $templateName => $className) {
				$this->doctrineManager->setImpl($templateName, $className);
			}
			
			// load models (that'll just work with empty values too)
			Doctrine::loadModels($this->getParameter('load_models'));
			
			// for 1.2, handle model autoloading and base paths
			if($is12 && ($this->hasParameter('load_models') || $this->hasParameter('models_directory'))) {
				if(!in_array(array('Doctrine', 'modelsAutoload'), $splAutoloadFunctions) && !in_array(array('Doctrine_Core', 'modelsAutoload'), $splAutoloadFunctions)) {
					spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));
				}
				
				if($this->hasParameter('models_directory')) {
					Doctrine_Core::setModelsDirectory($this->getParameter('models_directory'));
				}
			}
			
			// for 1.2, handle extension autoloading, base paths and registration
			if($is12 && ($this->hasParameter('extensions_path') || $this->hasParameter('register_extensions'))) {
				if(!in_array(array('Doctrine', 'extensionsAutoload'), $splAutoloadFunctions) && !in_array(array('Doctrine_Core', 'extensionsAutoload'), $splAutoloadFunctions)) {
					spl_autoload_register(array('Doctrine_Core', 'extensionsAutoload'));
				}
				
				if($this->hasParameter('extensions_path')) {
					Doctrine_Core::setExtensionsPath($this->getParameter('extensions_path'));
				}
				foreach((array)$this->getParameter('register_extensions', array()) as $extensionName) {
					if(is_array($extensionName)) {
						call_user_func_array(array($this->doctrineManager, 'registerExtension'), $extensionName);
					} else {
						$this->doctrineManager->registerExtension($extensionName);
					}
				}
			}
			
			foreach((array)$this->getParameter('bind_components', array()) as $componentName) {
				$this->doctrineManager->bindComponent($componentName, $name);
			}
			
			// TODO: this will force a connection, could be done using doctrine events
			foreach((array)$this->getParameter('init_queries') as $query) {
				$this->connection->exec($query);
			}
		} catch(Doctrine_Exception $e) {
			// the connection's foobar'd
			throw new AgaviDatabaseException($e->getMessage());
		}
		*/
	}

	public function shutdown()
	{
		if ($this->connection !== null && $this->connection->isConnected()) {
			$this->entityManager->close();
			$this->connection->close();
			$this->connection = null;
			$this->resource = null;
		}
	}

	public function getEntityManager()
	{
		return $this->entityManager;
	}
}

?>