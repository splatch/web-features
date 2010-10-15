<?php

use WebFeatures\Model\File;

class Files_AddAction extends WebfeaturesFilesBaseAction
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
		return 'Input';
	}
	
	public function executeWrite(AgaviRequestDataHolder $rd)
	{
		$ctx = $this->getContext();
		$url = $rd->getParameter('file_url');
		$source = @file_get_contents($url);
		if (!$source){
			return 'Error';
		}
		
		$parts = explode('/',$url);
		$filename = $parts[count($parts)-1];
		file_put_contents('data/'.$filename, $source);
		
		$file = new File();
		$file->setFilename($filename);
		$file->setParsed(0);

		$em = $this->getContext()->getDatabaseManager()->getDatabase()->getEntityManager();
		$em->persist($file);
		$em->flush();

		return 'Success';
	}
}

?>