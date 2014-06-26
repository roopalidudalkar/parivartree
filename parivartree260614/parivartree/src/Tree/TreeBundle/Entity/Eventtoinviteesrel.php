<?php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventtoinviteesrel
 */
class Eventtoinviteesrel
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $eventid;

    /**
     * @var integer
     */
    private $inviteeid;

    /**
     * @var integer
     */
    private $inviteestatus;


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
     * Set eventid
     *
     * @param integer $eventid
     * @return Eventtoinviteesrel
     */
    public function setEventid($eventid)
    {
        $this->eventid = $eventid;

        return $this;
    }

    /**
     * Get eventid
     *
     * @return integer 
     */
    public function getEventid()
    {
        return $this->eventid;
    }

    /**
     * Set inviteeid
     *
     * @param integer $inviteeid
     * @return Eventtoinviteesrel
     */
    public function setInviteeid($inviteeid)
    {
        $this->inviteeid = $inviteeid;

        return $this;
    }

    /**
     * Get inviteeid
     *
     * @return integer 
     */
    public function getInviteeid()
    {
        return $this->inviteeid;
    }

    /**
     * Set inviteestatus
     *
     * @param integer $inviteestatus
     * @return Eventtoinviteesrel
     */
    public function setInviteestatus($inviteestatus)
    {
        $this->inviteestatus = $inviteestatus;

        return $this;
    }

    /**
     * Get inviteestatus
     *
     * @return integer 
     */
    public function getInviteestatus()
    {
        return $this->inviteestatus;
    }
}
