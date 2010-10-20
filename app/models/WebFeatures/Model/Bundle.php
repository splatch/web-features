<?php

namespace WebFeatures\Model;

/**
 * WebFeatures\Model\Bundle
 */
class Bundle
{
    /**
     * @var string $bundle
     */
    private $bundle;

    /**
     * @var integer $id
     */
    private $id;
    
    /**
     * @var integer $feature_id
     */
    private $feature_id;

    /**
     * Set bundle
     *
     * @param string $bundle
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;
    }

    /**
     * Get bundle
     *
     * @return string $bundle
     */
    public function getBundle()
    {
        return $this->bundle;
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
     * Set feature_id
     *
     * @param integer $featureId
     */
    public function setFeatureId($featureId)
    {
        $this->feature_id = $featureId;
    }

    /**
     * Get feature_id
     *
     * @return integer $featureId
     */
    public function getFeatureId()
    {
        return $this->feature_id;
    }

}