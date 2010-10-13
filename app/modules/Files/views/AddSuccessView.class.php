<?php

class Files_AddSuccessView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Add');
	}
}

?>