<?php

class Files_ShowErrorView extends WebfeaturesFilesBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Show');
	}
}