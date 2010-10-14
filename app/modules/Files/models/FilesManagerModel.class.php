<?php

use Doctrine\ORM\Internal\Hydration\HydrationException;
class Files_FilesManagerModel extends WebfeaturesFilesBaseModel
{
	/**
	 * @var Doctrine\ORM\EntityManager Entity manager.
	 */
	private $em;
	
	public function initialize(AgaviContext $context, array $parameters = array()) {
		parent::initialize($context, $parameters);

		$this->em = $context->getDatabaseManager()->getDatabase()->getEntityManager();
	}

  	public function getList()
  	{
  		$query = $this->em->createQuery('SELECT f FROM WebFeatures\Model\File f');

  		return $query->getResult();
  	}
  	
  	public function retrieveById($id){
		$sql = 'SELECT * FROM files WHERE id = ?';
  
    	$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
    	$stmt->bindValue(1, $id, PDO::PARAM_INT);
    	$stmt->execute();
  
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
	    
	    if (false != $result)
	    {
	      return $this->getContext()->getModel('Files', 'Files', array($result));
	    }
	    
	    return null;
  	}
}

?>