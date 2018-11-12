<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $added;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fruits", inversedBy="users")
     */
    protected $fruits;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->fruits = new ArrayCollection();
        $this->setAdded(new \DateTime());
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdded(): ?\DateTimeInterface
    {
        return $this->added;
    }

    public function setAdded(\DateTimeInterface $added): self
    {
        $this->added = $added;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getFruits()
    {
        return $this->fruits;
    }

    /**
     * @param Fruits $fruit
     * @return self
     */
    public function addFruits(Fruits $fruit)
    {
        $this->fruits[] = $fruit;
        return $this;
    }

    /**
     * @param Fruits $fruits
     */
    public function removeFruits(Fruits $fruits)
    {
        $this->fruits->removeElement($fruits);
    }
}
