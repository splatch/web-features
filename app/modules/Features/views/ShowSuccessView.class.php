<?php

class Features_ShowSuccessView extends WebfeaturesFeaturesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Show');
	}
}

?>