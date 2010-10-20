<?php
use WebFeatures\Model\Bundle;
use WebFeatures\Model\Feature;
use WebFeatures\Model\Repository;

class Files_ParseAction extends WebfeaturesFilesBaseAction
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
  		
  		$manager = $this->getModel('\WebFeatures\DAO\FileDAO');
  		$file = $manager->findById($fileId);
  		$this->setAttribute('file', $file[0]);

  		$xmlFile = simplexml_load_file('data/'.$file[0]->getFilename());
  		
  		$em = $this->getContext()->getDatabaseManager()->getDatabase()->getEntityManager();
  		
  		foreach ($xmlFile AS $obj)
  		{
  			if ($obj->getName()=='repository')
  			{
  				$repo = new Repository();
  				$repo->setFileId($fileId);
  				$repo->setRepository((string)$obj);
  				
				$em->persist($repo);
				$em->flush();
  				
  			} elseif ($obj->getName()=='feature')
  			{
  				$feature = new Feature();
  				$feature->setFileId($fileId);
  				$feature->setName((string)$obj['name']);
  				$feature->setVersion((string)$obj['version']);
  				$feature->setReferenceId(0);
  				
  				$em->persist($feature);
  				$em->flush();
  				$referenceId = $feature->getId();

  				foreach ($obj as $featureElem)
  				{
  					if ($featureElem->getName()=='feature')
  					{
  						$feature = new Feature();
  						$feature->setFileId($fileId);
  						$feature->setName((string)$featureElem);
  						$feature->setVersion((string)$featureElem['version']);
  						$feature->setReferenceId($referenceId);
  						
  						$em->persist($feature);
  						$em->flush();
  						
  					} elseif ($featureElem->getName()=='bundle')
  					{
  						$bundle = new Bundle();
  						$bundle->setBundle((string)$featureElem);
  						$bundle->setFeatureId($referenceId);
  						
  						$em->persist($bundle);
  						$em->flush();

  					}
  				}
  			}
  		}
  		$file = $file[0];
  		$file->setParsed(1);
  		
  		$em->persist($file);
  		$em->flush();
  		
  		return 'Success';
  	}
  	
	public function isSecure()
	{
	  return true;
	}
}

?>