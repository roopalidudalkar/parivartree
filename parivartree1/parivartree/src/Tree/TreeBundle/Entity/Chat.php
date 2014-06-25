<?php

namespace Tree\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 */
class Chat
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $msgfrom;

    /**
     * @var integer
     */
    private $msgto;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $sent;

    /**
     * @var integer
     */
    private $recd;


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
     * Set msgfrom
     *
     * @param integer $msgfrom
     * @return Chat
     */
    public function setMsgfrom($msgfrom)
    {
        $this->msgfrom = $msgfrom;

        return $this;
    }

    /**
     * Get msgfrom
     *
     * @return integer 
     */
    public function getMsgfrom()
    {
        return $this->msgfrom;
    }

    /**
     * Set msgto
     *
     * @param integer $msgto
     * @return Chat
     */
    public function setMsgto($msgto)
    {
        $this->msgto = $msgto;

        return $this;
    }

    /**
     * Get msgto
     *
     * @return integer 
     */
    public function getMsgto()
    {
        return $this->msgto;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Chat
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set sent
     *
     * @param \DateTime $sent
     * @return Chat
     */
    public function setSent($sent)
    {
        $this->sent = $sent;

        return $this;
    }

    /**
     * Get sent
     *
     * @return \DateTime 
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * Set recd
     *
     * @param integer $recd
     * @return Chat
     */
    public function setRecd($recd)
    {
        $this->recd = $recd;

        return $this;
    }

    /**
     * Get recd
     *
     * @return integer 
     */
    public function getRecd()
    {
        return $this->recd;
    }
}
