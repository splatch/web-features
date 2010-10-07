<?php

class Default_ParseSuccessView extends WebfeaturesDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Parse');
		
		$filename = '../pub/data/sample_file.xml';

		$features = simplexml_load_file($filename);
		
		$this->setAttribute('source', $features);
	}
}

?>