<?php

namespace WebFeatures\Model;

/**
 * WebFeatures\Model\Feature
 */
class Feature
{
    /**
     * @var integer $file_id
     */
    private $file_id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $version
     */
    private $version;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * Set file_id
     *
     * @param integer $fileId
     */
    public function setFileId($fileId)
    {
        $this->file_id = $fileId;
    }

    /**
     * Get file_id
     *
     * @return integer $fileId
     */
    public function getFileId()
    {
        return $this->file_id;
    }

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
     * Set version
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return string $version
     */
    public function getVersion()
    {
        return $this->version;
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
     * @var integer $reference_id
     */
    private $reference_id;

    /**
     * Set reference_id
     *
     * @param integer $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->reference_id = $referenceId;
    }

    /**
     * Get reference_id
     *
     * @return integer $referenceId
     */
    public function getReferenceId()
    {
        return $this->reference_id;
    }




}