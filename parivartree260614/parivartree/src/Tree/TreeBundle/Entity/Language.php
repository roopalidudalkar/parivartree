<?php
// src/Tree/TreeBundle/Entity/Language.php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Language
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $language;


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
     * Set language
     *
     * @param string $language
     * @return Language
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
