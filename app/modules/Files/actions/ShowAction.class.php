<?php

class Files_ShowAction extends WebfeaturesFilesBaseAction
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
  		$fileId = $rd->getParameter('id');
		$this->setAttribute('id', $fileId);
  		
  		$fileManager = $this->getModel('\WebFeatures\DAO\FileDAO');
  		$file = $fileManager->findById($fileId);
  		$file = $file[0];
  		$this->setAttribute('file', $file);
  		
  		if ($file->isParsed())
  		{
  			$repositoryManager = $this->getModel('\WebFeatures\DAO\RepositoryDAO');
  			$repositories = $repositoryManager->findBy(array('file_id' => $fileId));
  			$this->setAttribute('repositories', $repositories);
  			
  			$featureManager = $this->getModel('\WebFeatures\DAO\FeatureDAO');
  			$features = $featureManager->findBy(array('file_id' => $fileId, 'reference_id' => 0));
  			$this->setAttribute('features', $features);
  		}

  		$source = file_get_contents('data/'.$file->getFilename());
  		$this->setAttribute('source', $source);
  		return 'Success';
  	}
}

?>