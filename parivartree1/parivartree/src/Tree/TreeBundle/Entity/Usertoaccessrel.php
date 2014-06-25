<?php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usertoaccessrel
 */
class Usertoaccessrel
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
     * @var \DateTime
     */
    private $login_time;

    /**
     * @var \DateTime
     */
    private $logout_time;


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
     * @return Usertoaccessrel
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
     * Set login_time
     *
     * @param \DateTime $loginTime
     * @return Usertoaccessrel
     */
    public function setLoginTime($loginTime)
    {
        $this->login_time = $loginTime;

        return $this;
    }

    /**
     * Get login_time
     *
     * @return \DateTime 
     */
    public function getLoginTime()
    {
        return $this->login_time;
    }

    /**
     * Set logout_time
     *
     * @param \DateTime $logoutTime
     * @return Usertoaccessrel
     */
    public function setLogoutTime($logoutTime)
    {
        $this->logout_time = $logoutTime;

        return $this;
    }

    /**
     * Get logout_time
     *
     * @return \DateTime 
     */
    public function getLogoutTime()
    {
        return $this->logout_time;
    }
}
