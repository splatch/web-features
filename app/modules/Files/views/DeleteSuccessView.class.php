<?php

class Files_DeleteSuccessView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Delete');
	}
}

?>