<?php

class Default_StaticContentSuccessView extends WebfeaturesDefaultBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd);
    $words = explode('-', $rd->getParameter('page'));
    array_walk($words, create_function('&$i', '$i = ucfirst(strtolower($i));'));
    $tmpl = 'StaticContent' . implode($words);
    if (file_exists(
     dirname($this->getLayer('content')->getResourceStreamIdentifier()) 
     . "/$tmpl.php")) {
      $this->getLayer('content')->setTemplate($tmpl); 
    } else {
      return $this->createForwardContainer(
       AgaviConfig::get('actions.error404_module'), 
       AgaviConfig::get('actions.error404_action'));      
    }
  }
	
}

?>