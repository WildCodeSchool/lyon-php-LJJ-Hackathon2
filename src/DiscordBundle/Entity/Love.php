<?php

namespace DiscordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Love
 *
 * @ORM\Table(name="love")
 * @ORM\Entity(repositoryClass="DiscordBundle\Repository\LoveRepository")
 */
class Love
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="User", inversedBy="loves", cascade={"persist"})
     */
    private $user;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Message", inversedBy="loves", cascade={"persist"})
     */
    private $message;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \DiscordBundle\Entity\User $user
     *
     * @return Love
     */
    public function setUser(\DiscordBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \DiscordBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set message
     *
     * @param \DiscordBundle\Entity\Message $message
     *
     * @return Love
     */
    public function setMessage(\DiscordBundle\Entity\Message $message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return \DiscordBundle\Entity\Message
     */
    public function getMessage()
    {
        return $this->message;
    }
}
