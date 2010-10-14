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

/**
 * The base action from which all project actions inherit.
 * 
 * @author luke@code-house.org
 */
class WebfeaturesBaseAction extends AgaviAction {

	/**
	 * Get model, remember that agavi looks for class with 'Model' suffix!
	 *
	 * @param string $name Name of the DAO class, without Model suffix.
	 */
	protected function getModel($name) {
		return $this->getContext()->getModel($name);
	}
}

?>