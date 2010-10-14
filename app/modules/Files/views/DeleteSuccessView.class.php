<?php

class Files_DeleteSuccessView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
	    $url = $this->getContext()->getRouting()->gen('Files');
	    
	    $this->getResponse()->setRedirect($url);
	}
}

?>