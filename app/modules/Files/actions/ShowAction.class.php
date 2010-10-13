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
  		$manager = $this->getContext()->getModel('FilesManager', 'Files');
  		$file = $manager->retrieveById($fileId)->toArray();
  		$this->setAttribute('file', $file);
  		$source = file_get_contents('data/'.$file['filename']);
  		$this->setAttribute('source', $source);
  		return 'Success';
  	}
}

?>