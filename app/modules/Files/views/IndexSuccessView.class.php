<?php

class Files_IndexSuccessView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		$this->setAttribute('files', $this->getAttribute('files'));

		$this->setAttribute('_title', 'Index');
	}
}

?>