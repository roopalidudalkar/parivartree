<?php
// src/Tree/TreeBundle/Entity/Usertoiprel.php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Usertoiprel
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $userid;

    /**
     * @var integer
     */
    private $login_ip;

    /**
     * @var integer
     */
    private $logout_ip;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return Usertoiprel
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set login_ip
     *
     * @param integer $loginIp
     * @return Usertoiprel
     */
    public function setLoginIp($loginIp)
    {
        $this->login_ip = $loginIp;

        return $this;
    }

    /**
     * Get login_ip
     *
     * @return integer 
     */
    public function getLoginIp()
    {
        return $this->login_ip;
    }

    /**
     * Set logout_ip
     *
     * @param integer $logoutIp
     * @return Usertoiprel
     */
    public function setLogoutIp($logoutIp)
    {
        $this->logout_ip = $logoutIp;

        return $this;
    }

    /**
     * Get logout_ip
     *
     * @return integer 
     */
    public function getLogoutIp()
    {
        return $this->logout_ip;
    }
}
