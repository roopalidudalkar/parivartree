<?php

// src/Admin/AdminBundle/Entity/Country.php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Country
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $countryid;

    /**
     * @var integer
     */
    private $stateid;

    /**
     * @var integer
     */
    private $cityid;

    /**
     * @var string
     */
    private $parameter;

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
     * Set countryid
     *
     * @param integer $countryid
     * @return Country
     */
    public function setCountryid($countryid)
    {
        $this->countryid = $countryid;

        return $this;
    }

    /**
     * Get countryid
     *
     * @return integer 
     */
    public function getCountryid()
    {
        return $this->countryid;
    }

    /**
     * Set stateid
     *
     * @param integer $stateid
     * @return Country
     */
    public function setStateid($stateid)
    {
        $this->stateid = $stateid;

        return $this;
    }

    /**
     * Get stateid
     *
     * @return integer 
     */
    public function getStateid()
    {
        return $this->stateid;
    }

    /**
     * Set cityid
     *
     * @param integer $cityid
     * @return Country
     */
    public function setCityid($cityid)
    {
        $this->cityid = $cityid;

        return $this;
    }

    /**
     * Get cityid
     *
     * @return integer 
     */
    public function getCityid()
    {
        return $this->cityid;
    }

    /**
     * Set parameter
     *
     * @param string $parameter
     * @return Country
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * Get parameter
     *
     * @return string 
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Country
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
}
