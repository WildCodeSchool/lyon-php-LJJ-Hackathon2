<?php

namespace DiscordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="DiscordBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="blob")
     */
    private $avatar;

    /**
     * One User can give Many loves
     * @var
     * @ORM\OneToMany(targetEntity="Love", mappedBy="user", cascade={"persist"})
     */
    private $loves;

    /**
     * One User can write Many messages
     * @var
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user", cascade={"persist"})
     */
    private $messages;


    /**
     * One User can write Many quotes
     * @var
     * @ORM\OneToMany(targetEntity="Quote", mappedBy="user", cascade={"persist"})
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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loves = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->quotes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add love
     *
     * @param \DiscordBundle\Entity\Love $love
     *
     * @return User
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
     * Add message
     *
     * @param \DiscordBundle\Entity\Message $message
     *
     * @return User
     */
    public function addMessage(\DiscordBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \DiscordBundle\Entity\Message $message
     */
    public function removeMessage(\DiscordBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add quote
     *
     * @param \DiscordBundle\Entity\Quote $quote
     *
     * @return User
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
