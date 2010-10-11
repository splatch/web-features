<?php

class Default_FeaturesModel extends WebfeaturesDefaultBaseModel
{
	private $id;
	private $file_id;
	private $name;
	private $version;
	
	public function __construct(array $data = null){
	  	if(!empty($data)){
	  		$this->fromArray($data);
		}
	}
	
}

?>