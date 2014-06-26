<?php
// src/Tree/TreeBundle/Entity/User.php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class User
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $userhash;

    /**
     * @var integer
     */
    private $sessionid;

    /**
     * @var string
     */
    private $sessionhash;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \DateTime
     */
    private $last_access;

    /**
     * @var integer
     */
    private $last_access_ip;

    /**
     * @var integer
     */
    private $status;


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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set userhash
     *
     * @param string $userhash
     * @return User
     */
    public function setUserhash($userhash)
    {
        $this->userhash = $userhash;

        return $this;
    }

    /**
     * Get userhash
     *
     * @return string 
     */
    public function getUserhash()
    {
        return $this->userhash;
    }

    /**
     * Set sessionid
     *
     * @param integer $sessionid
     * @return User
     */
    public function setSessionid($sessionid)
    {
        $this->sessionid = $sessionid;

        return $this;
    }

    /**
     * Get sessionid
     *
     * @return integer 
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Set sessionhash
     *
     * @param string $sessionhash
     * @return User
     */
    public function setSessionhash($sessionhash)
    {
        $this->sessionhash = $sessionhash;

        return $this;
    }

    /**
     * Get sessionhash
     *
     * @return string 
     */
    public function getSessionhash()
    {
        return $this->sessionhash;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set last_access
     *
     * @param \DateTime $lastAccess
     * @return User
     */
    public function setLastAccess($lastAccess)
    {
        $this->last_access = $lastAccess;

        return $this;
    }

    /**
     * Get last_access
     *
     * @return \DateTime 
     */
    public function getLastAccess()
    {
        return $this->last_access;
    }

    /**
     * Set last_access_ip
     *
     * @param integer $lastAccessIp
     * @return User
     */
    public function setLastAccessIp($lastAccessIp)
    {
        $this->last_access_ip = $lastAccessIp;

        return $this;
    }

    /**
     * Get last_access_ip
     *
     * @return integer 
     */
    public function getLastAccessIp()
    {
        return $this->last_access_ip;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @var integer
     */
    private $mobilecode;


    /**
     * Set mobilecode
     *
     * @param integer $mobilecode
     * @return User
     */
    public function setMobilecode($mobilecode)
    {
        $this->mobilecode = $mobilecode;

        return $this;
    }

    /**
     * Get mobilecode
     *
     * @return integer 
     */
    public function getMobilecode()
    {
        return $this->mobilecode;
    }
    /**
     * @var integer
     */
    private $login_status;


    /**
     * Set login_status
     *
     * @param integer $loginStatus
     * @return User
     */
    public function setLoginStatus($loginStatus)
    {
        $this->login_status = $loginStatus;

        return $this;
    }

    /**
     * Get login_status
     *
     * @return integer 
     */
    public function getLoginStatus()
    {
        return $this->login_status;
    }
    /**
     * @var integer
     */
    private $logincount;


    /**
     * Set logincount
     *
     * @param integer $logincount
     * @return User
     */
    public function setLogincount($logincount)
    {
        $this->logincount = $logincount;

        return $this;
    }

    /**
     * Get logincount
     *
     * @return integer 
     */
    public function getLogincount()
    {
        return $this->logincount;
    }
    /**
     * @var text
     */
    private $violationrule;


    /**
     * Set violationrule
     *
     * @param \text $violationrule
     * @return User
     */
    public function setViolationrule($violationrule)
    {
        $this->violationrule = $violationrule;

        return $this;
    }

    /**
     * Get violationrule
     *
     * @return \text
     */
    public function getViolationrule()
    {
        return $this->violationrule;
    }
    /**
     * @var string
     */
    private $authmechanism;


    /**
     * Set authmechanism
     *
     * @param string $authmechanism
     * @return User
     */
    public function setAuthmechanism($authmechanism)
    {
        $this->authmechanism = $authmechanism;

        return $this;
    }

    /**
     * Get authmechanism
     *
     * @return string 
     */
    public function getAuthmechanism()
    {
        return $this->authmechanism;
    }
}
