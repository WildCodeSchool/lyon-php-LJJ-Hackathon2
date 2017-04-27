<?php

namespace DiscordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="DiscordBundle\Repository\MessageRepository")
 */
class Message
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
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


    /**
     * One Message can have Many loves
     * @var
     * @ORM\OneToMany(targetEntity="Love", mappedBy="message", cascade={"persist"})
     */
    private $loves;


    /**
     * Many Messages can come from One User
     * @var
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages", cascade={"persist"})
     */
    private $user;


    /**
     * One Message can include Many quotes
     * @var
     * @ORM\OneToMany(targetEntity="Quote", mappedBy="message", cascade={"persist"})
     */
    private $quotes;



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
     * Set message
     *
     * @param string $message
     *
     * @return Message
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
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Message
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loves = new \Doctrine\Common\Collections\ArrayCollection();
        $this->quotes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add love
     *
     * @param \DiscordBundle\Entity\Love $love
     *
     * @return Message
     */
    public function addLove(\DiscordBundle\Entity\Love $love)
    {
        $this->loves[] = $love;

        return $this;
    }

    /**
     * Remove love
     *
     * @param \DiscordBundle\Entity\Love $love
     */
    public function removeLove(\DiscordBundle\Entity\Love $love)
    {
        $this->loves->removeElement($love);
    }

    /**
     * Get loves
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLoves()
    {
        return $this->loves;
    }

    /**
     * Set user
     *
     * @param \DiscordBundle\Entity\User $user
     *
     * @return Message
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
     * Add quote
     *
     * @param \DiscordBundle\Entity\Quote $quote
     *
     * @return Message
     */
    public function addQuote(\DiscordBundle\Entity\Quote $quote)
    {
        $this->quotes[] = $quote;

        return $this;
    }

    /**
     * Remove quote
     *
     * @param \DiscordBundle\Entity\Quote $quote
     */
    public function removeQuote(\DiscordBundle\Entity\Quote $quote)
    {
        $this->quotes->removeElement($quote);
    }

    /**
     * Get quotes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuotes()
    {
        return $this->quotes;
    }
}
