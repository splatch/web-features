<?php

namespace WebFeatures\Model;

/**
 * WebFeatures\Model\File
 */
class File
{

    /**
     * @var string $filename
     */
    private $filename;

    /**
     * @var integer $id
     */
    private $id;
    
    /**
     * @var boolean $parsed
     */
    private $parsed;

    /**
     * Set filename
     *
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get filename
     *
     * @return string $filename
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * 
     * Set parsed flag
     * 
     * @param integer $parsed
     */
    public function setParsed($parsed)
    {
    	$this->parsed = ($parsed == 1) ? true : false;
    }
    
    /**
     * Get parsed flag
     * 
     * @return boolean $parsed
     */
    public function isParsed(){
    	return $this->parsed;
    }
    /**
     * Get parsed
     *
     * @return integer $parsed
     */
    public function getParsed()
    {
        return $this->parsed;
    }






}