<?php
/*
 * Licensed to the Code-House under one or more contributor license agreements.
 * The Code-House licenses this file to you under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with the 
 * License. You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software distributed
 * under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License. 
 */
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Base model from whole project.
 * 
 * @author luke@code-house.org
 */
class WebfeaturesBaseModel extends EntityRepository implements 
	AgaviISingletonModel { // make sure we have only one instance of every dao

	/**
	 * Default constructor.
	 * 
	 * @param string $class Name of the domain class.
	 */
	public function __construct($class) {
		$this->_entityName = $class;
	}

	/**
	 * Initialize DAO.
	 *
	 * @param AgaviContext $context Framework configured context.
	 */
	public function initialize(AgaviContext $context) {
		$this->_em = $context->getDatabaseManager()->getDatabase()->getEntityManager();
		$this->_class = $this->_em->getClassMetadata($this->_entityName);
	}

	// no context
	public function getContext() {
		return null;
	}
}

?>