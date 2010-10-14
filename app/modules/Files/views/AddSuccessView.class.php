<?php

class Files_AddSuccessView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
	    $url = $this->getContext()->getRouting()->gen('Files');
	    
	    $this->getResponse()->setRedirect($url);
	}
}

?>