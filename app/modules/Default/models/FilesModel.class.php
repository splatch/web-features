<?php

class Default_FilesModel extends WebfeaturesDefaultBaseModel
{
	
  	public function retrieveById($id){
		$sql = 'SELECT * FROM files WHERE id = ?';
  
    	$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
    	$stmt->bindValue(1, $id, PDO::PARAM_INT);
    	$stmt->execute();
  
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
	    
	    if (false != $result)
	    {
	      return $this->getContext()->getModel('File', 'Files', array($result));
	    }
	    
	    return null;
  	}

  	public function getList(){
  		$sql = 'SELECT * FROM files ORDER BY id DESC';
  		
  		$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
  		$stmt->execute();
  		
  		$result = $stmt->fetch(PDO::FETCH_ASSOC);
  		
  		if (false != $result)
  		{
  			return $this->getContext()->getModel('File', 'Files', array($result));
  		}
  		
  		return null;
  	}
}

?>