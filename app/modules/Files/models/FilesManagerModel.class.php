<?php

class Files_FilesManagerModel extends WebfeaturesFilesBaseModel
{
  	public function getList()
  	{
  		$sql = 'SELECT * FROM files ORDER BY id DESC';
  		
  		$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
  		$stmt->execute();
  		
  		$result = $stmt->fetchAll();

  		if (false != $result)
  		{
  			$files = array();
			foreach ($result as $row)
			{
				$files[] = $this->getContext()->getModel('Files', 'Files', array($row));
			}
  			
			return $files;
  		}
  		
  		return null;
  	}
  	
  	public function retrieveById($id)
  	{
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