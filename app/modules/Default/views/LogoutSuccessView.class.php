<?php

class Default_LogoutSuccessView extends WebfeaturesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
    	$this->getResponse()->setRedirect($this->getContext()->getRouting()->gen('Files'));
	}
}

?>