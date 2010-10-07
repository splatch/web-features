<?php

class Default_LoginInputView extends WebfeaturesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Login');
	}
}

?>