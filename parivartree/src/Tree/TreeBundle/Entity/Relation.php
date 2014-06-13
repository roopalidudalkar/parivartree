<?php
// src/Tree/TreeBundle/Entity/Relation.php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Relation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $relation;


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
     * Set relation
     *
     * @param string $relation
     * @return Relation
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get relation
     *
     * @return string 
     */
    public function getRelation()
    {
        return $this->relation;
    }
}
