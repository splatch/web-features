<?php

class Files_FilesValidator extends AgaviValidator
{
	/**
	* Validates the input
	* 
	* @return     bool The input is valid number according to given parameters.
	*/
	protected function validate()
	{
		$fileId = $this->getData('id');
    
		$manager = $this->getContext()->getModel('\WebFeatures\DAO\FileDAO');
		$file = $manager->findById($fileId);
    	
	    if (null == $file[0])
	    {
	      $this->throwError();
	      return false;
	    }
	    
	    return true;
	}
}

?>