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
 * The base view from which all project views inherit.
 */
class WebfeaturesBaseView extends AgaviView
{
	const SLOT_LAYOUT_NAME = 'slot';
	
	/**
	 * Handles output types that are not handled elsewhere in the view. The
	 * default behavior is to simply throw an exception.
	 *
	 * @param      AgaviRequestDataHolder The request data associated with
	 *                                    this execution.
	 *
	 * @throws     AgaviViewException if the output type is not handled.
	 */
	public final function execute(AgaviRequestDataHolder $rd)
	{
		throw new AgaviViewException(sprintf(
			'The view "%1$s" does not implement an "execute%3$s()" method to serve '.
			'the output type "%2$s", and the base view "%4$s" does not implement an '.
			'"execute%3$s()" method to handle this situation.',
			get_class($this),
			$this->container->getOutputType()->getName(),
			ucfirst(strtolower($this->container->getOutputType()->getName())),
			get_class()
		));
	}

	/**
	 * Prepares the HTML output type.
	 *
	 * @param      AgaviRequestDataHolder The request data associated with
	 *                                    this execution.
	 * @param      string The layout to load.
	 */
	public function setupHtml(AgaviRequestDataHolder $rd, $layoutName = null)
	{
		if($layoutName === null && $this->getContainer()->getParameter('is_slot', false)) {
			// it is a slot, so we do not load the default layout, but a different one
			// otherwise, we could end up with an infinite loop
			$layoutName = self::SLOT_LAYOUT_NAME;
		}

		// now load the layout
		// this method returns an array containing the parameters that were declared on the layout (not on a layer!) in output_types.xml
		// you could use this, for instance, to automatically set a bunch of CSS or Javascript includes based on layout parameters -->
		$this->loadLayout($layoutName);
	}
}

?>