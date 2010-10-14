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
  	
  	public function retrieveById($id)
  	{
//		$sql = 'SELECT * FROM files WHERE id = ?';
//  
//    	$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
//    	$stmt->bindValue(1, $id, PDO::PARAM_INT);
//    	$stmt->execute();
//  
//	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
//	    
//	    if (false != $result)
//	    {
//	      return $this->getContext()->getModel('Files', 'Files', array($result));
//	    }
//	    
//	    return null;

  		$query = $this->em->createQuery('SELECT f FROM WebFeatures\Model\File f WHERE id = '.$id);
  		return $query->getResult();
  	}
  	
	public function storeNew(Files_FilesModel $file)
	{
		$con = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		    
		$sql = 'INSERT INTO files (filename) VALUES (?)';
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindValue(1, $file->getFilename(), PDO::PARAM_STR);
		
		$stmt->execute();
		
		return $con->lastInsertId();
	}
	
	public function deleteFile($id)
	{
		$con = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		
		$sql = 'SELECT * FROM files WHERE id = ?';
		
		$stmt = $con->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if ($result)
		{
			@unlink("data/".$result['filename']);
			$sql = 'DELETE FROM files WHERE id = ?';
		
			$stmt = $con->prepare($sql);
			$stmt->bindValue(1, $id, PDO::PARAM_INT);
			$stmt->execute();
		}
		
		return null;
	}
}

?>