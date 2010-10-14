<?php

namespace WebFeatures\Model;

/**
 * WebFeatures\Model\File
 */
class File
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $filename
     */
    private $filename;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

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
}