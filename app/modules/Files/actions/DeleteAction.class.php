<?php

class Files_DeleteAction extends WebfeaturesFilesBaseAction
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

  		$manager = $this->getModel('\WebFeatures\DAO\FileDAO');
  		$file = $manager->findById($fileId);
  		
  		@unlink('data/'.$file[0]->getFilename());
  		
  		$em = $this->getContext()->getDatabaseManager()->getDatabase()->getEntityManager();
  		$em->remove($file[0]);
  		$em->flush();
  		
  		return 'Success';
  	}
	
}

?>