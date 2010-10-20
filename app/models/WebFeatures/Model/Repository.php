<?php

namespace WebFeatures\Model;

/**
 * WebFeatures\Model\Repository
 */
class Repository
{
    /**
     * @var integer $file_id
     */
    private $file_id;

    /**
     * @var string $repository
     */
    private $repository;

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
     * Set repository
     *
     * @param string $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository
     *
     * @return string $repository
     */
    public function getRepository()
    {
        return $this->repository;
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