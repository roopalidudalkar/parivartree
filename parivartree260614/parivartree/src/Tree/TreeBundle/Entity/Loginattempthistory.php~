<?php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Loginattempthistory 
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
    private $attempted;

    /**
     * @var string
     */
    private $ip;


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
     * @return Loginattempthistory
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
     * Set attempted
     *
     * @param \DateTime $attempted
     * @return Loginattempthistory
     */
    public function setAttempted($attempted)
    {
        $this->attempted = $attempted;

        return $this;
    }

    /**
     * Get attempted
     *
     * @return \DateTime 
     */
    public function getAttempted()
    {
        return $this->attempted;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Loginattempthistory
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }
}
