<?php

class Features_ShowAction extends WebfeaturesFeaturesBaseAction
{
	/**
	 * Returns the default view if the action does not serve the request
	 * method used.
	 *
	 * @return     mixed <ul>
	 *                     <li>A string containing the view name associated
	 *                     with this action; or</li>
	 *                     <li>An array with two indices: the parent module
	 *                     of the view to be executed and the view to be
	 *                     executed.</li>
	 *                   </ul>
	 */
	public function getDefaultViewName()
	{
		return 'Success';
	}
	
  	public function executeRead(AgaviRequestDataHolder $rd)
  	{
  		$featureId = $rd->getParameter('id');

		$featureManager = $this->getModel('\WebFeatures\DAO\FeatureDAO');
		$feature = $featureManager->find($featureId);
		$this->setAttribute('feature', $feature);
		
  		$references = $featureManager->findBy(array('reference_id' => $feature->getId()));
  		$this->setAttribute('references', $references);

  		
  		$bundleManager = $this->getModel('\WebFeatures\DAO\BundleDAO');
  		$bundles = $bundleManager->findBy(array('feature_id' => $feature->getId()));
  		$this->setAttribute('bundles', $bundles);
  		
  		return 'Success';
  	}
}

?>