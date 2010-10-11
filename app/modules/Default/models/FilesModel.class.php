<?php

class Default_FilesModel extends WebfeaturesDefaultBaseModel
{
	private $id;
	private $filename;
	
	public function __construct(array $data = null){
	  	if(!empty($data)){
	  		$this->fromArray($data);
		}
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getFilename(){
		return $this->filename;
	}
	
	public function setFilename($filename){
		$this->filename = $filename;
	}
	
	public function fromArray(array $data){
		$this->setId($data['id']);
		$this->setFilename($data['filename']);
	}
	
	public function toArray(){
		$data = array();
		$data['id'] = $this->getId();
		$data['filename'] = $this->getFilename();
	}
}

?>