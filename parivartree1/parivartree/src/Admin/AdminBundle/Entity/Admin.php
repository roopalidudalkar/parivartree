<?php
// src/Admin/AdminBundle/Entity/Admin.php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Admin
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var integer
     */
    private $sessionid;

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
     * Set username
     *
     * @param string $username
     * @return Admin
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Admin
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
     * @return Admin
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
     * Set sessionid
     *
     * @param integer $sessionid
     * @return Admin
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
     * Set status
     *
     * @param integer $status
     * @return Admin
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
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $userhash;

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
     * Set firstname
     *
     * @param string $firstname
     * @return Admin
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Admin
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set userhash
     *
     * @param string $userhash
     * @return Admin
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
     * Set sessionhash
     *
     * @param string $sessionhash
     * @return Admin
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
     * @return Admin
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
     * @return Admin
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
     * @return Admin
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
     * @return Admin
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
     * @var integer
     */
    private $profile_id;


    /**
     * Set profile_id
     *
     * @param integer $profileId
     * @return Admin
     */
    public function setProfileId($profileId)
    {
        $this->profile_id = $profileId;

        return $this;
    }

    /**
     * Get profile_id
     *
     * @return integer 
     */
    public function getProfileId()
    {
        return $this->profile_id;
    }
}
