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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
