<?php

namespace WebFeatures\Model;

/**
 * WebFeatures\Model\User
 */
class User
{
    /**
     * @var string $login
     */
    private $login;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * Set login
     *
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * Get login
     *
     * @return string $login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
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