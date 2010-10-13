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
    
    $manager = $this->getContext()->getModel('FilesManager', 'Files');
    $post = $manager->retrieveById($fileId);
    
    if (null == $post)
    {
      $this->throwError();
      return false;
    }
    
    return true;
  }
}

?>