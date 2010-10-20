<?php

class Default_IndexSuccessView extends WebfeaturesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
	    $url = $this->getContext()->getRouting()->gen('Files');
	    
	    $this->getResponse()->setRedirect($url);
	}
}

?>