<?php

namespace DiscordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quote
 *
 * @ORM\Table(name="quote")
 * @ORM\Entity(repositoryClass="DiscordBundle\Repository\QuoteRepository")
 */
class Quote
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
     * Many Quote can be written by One user
     * @var
     * @ORM\ManyToOne(targetEntity="User", inversedBy="quotes", cascade={"persist"})
     */
    private $user;

    /**
     * Each Quote comes from only One message
     * @var
     * @ORM\ManyToOne(targetEntity="Message", inversedBy="quotes", cascade={"persist"})
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
     * @return Quote
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
     * @return Quote
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
