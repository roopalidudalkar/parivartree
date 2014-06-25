<?php
//src/Tree/TreeBundle/Entity/Accountlanguagerel.php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Accountlanguagerel
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
    private $languageid;


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
     * @return Accountlanguagerel
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
     * Set languageid
     *
     * @param integer $languageid
     * @return Accountlanguagerel
     */
    public function setLanguageid($languageid)
    {
        $this->languageid = $languageid;

        return $this;
    }

    /**
     * Get languageid
     *
     * @return integer 
     */
    public function getLanguageid()
    {
        return $this->languageid;
    }
}
