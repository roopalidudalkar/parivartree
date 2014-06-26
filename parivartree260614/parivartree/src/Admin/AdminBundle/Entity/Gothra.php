<?php
// src/Admin/AdminBundle/Entity/Gothra.php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Gothra
{
    /**
     * @var integer
     */
    private $id;

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
     * Set parameter
     *
     * @param string $parameter
     * @return Gothra
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
     * @return Gothra
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
