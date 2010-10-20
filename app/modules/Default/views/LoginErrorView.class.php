<?php

class Default_LoginErrorView extends WebfeaturesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
      $this->getResponse()->setRedirect($this->getContext()->getRouting()->gen('Login'));
	}
}

?>