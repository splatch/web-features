<?php

class Default_ParseErrorView extends WebfeaturesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Parse');
	}
}

?>