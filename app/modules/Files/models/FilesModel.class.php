<?php

class Files_FilesModel extends WebfeaturesFilesBaseModel
{
	private $id;
	private $filename;
	private $parsed;
	
	public function __construct(array $data = null)
	{
		if (!empty($data))
		{
			$this->fromArray($data);
		}
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getFilename()
	{
		return $this->filename;
	}
	
	public function setFilename($filename)
	{
		$this->filename = $filename;
	}
	
	public function isParsed(){
		return $this->parsed;
	}
	
	public function setParsed($parsed){
		$this->parsed = ($parsed==1) ? true : false;
	}
	
	public function fromArray(array $data)
	{
		$this->setId($data['id']);
		$this->setFilename($data['filename']);
		$this->setParsed($data['parsed']);
	}
	
	public function toArray()
	{
		return array(
			'id'		=>	$this->getId(),
			'filename'	=>	$this->getFilename(),
			'parsed'	=>	$this->isParsed()
		);
	}
}

?>