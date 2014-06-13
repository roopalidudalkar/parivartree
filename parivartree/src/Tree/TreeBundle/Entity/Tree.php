<?php
// src/Tree/TreeBundle/Entity/Tree.php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Tree
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nodeid;

    /**
     * @var integer
     */
    private $relnodeid;

    /**
     * @var integer
     */
    private $connection;

    /**
     * @var integer
     */
    private $relantionid;


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
     * Set nodeid
     *
     * @param integer $nodeid
     * @return Tree
     */
    public function setNodeid($nodeid)
    {
        $this->nodeid = $nodeid;

        return $this;
    }

    /**
     * Get nodeid
     *
     * @return integer 
     */
    public function getNodeid()
    {
        return $this->nodeid;
    }

    /**
     * Set relnodeid
     *
     * @param integer $relnodeid
     * @return Tree
     */
    public function setRelnodeid($relnodeid)
    {
        $this->relnodeid = $relnodeid;

        return $this;
    }

    /**
     * Get relnodeid
     *
     * @return integer 
     */
    public function getRelnodeid()
    {
        return $this->relnodeid;
    }

    /**
     * Set connection
     *
     * @param integer $connection
     * @return Tree
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * Get connection
     *
     * @return integer 
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Set relantionid
     *
     * @param integer $relantionid
     * @return Tree
     */
    public function setRelantionid($relantionid)
    {
        $this->relantionid = $relantionid;

        return $this;
    }

    /**
     * Get relantionid
     *
     * @return integer 
     */
    public function getRelantionid()
    {
        return $this->relantionid;
    }
    /**
     * @var integer
     */
    private $position;

    /**
     * @var integer
     */
    private $relationid;


    /**
     * Set position
     *
     * @param integer $position
     * @return Tree
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set relationid
     *
     * @param integer $relationid
     * @return Tree
     */
    public function setRelationid($relationid)
    {
        $this->relationid = $relationid;

        return $this;
    }

    /**
     * Get relationid
     *
     * @return integer 
     */
    public function getRelationid()
    {
        return $this->relationid;
    }
}
