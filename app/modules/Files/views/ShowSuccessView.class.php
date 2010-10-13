<?php

class Files_ShowSuccessView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Show');
	}
}

?>