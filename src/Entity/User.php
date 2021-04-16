<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $sexe;

    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity=entry::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entry;

    /**
     * @ORM\OneToMany(targetEntity=UserFood::class, mappedBy="IDUser")
     */
    private $IDFood;

    public function __construct()
    {
        $this->IDFood = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getEntry(): ?entry
    {
        return $this->entry;
    }

    public function setEntry(?entry $entry): self
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * @return Collection|UserFood[]
     */
    public function getIDFood(): Collection
    {
        return $this->IDFood;
    }

    public function addIDFood(UserFood $iDFood): self
    {
        if (!$this->IDFood->contains($iDFood)) {
            $this->IDFood[] = $iDFood;
            $iDFood->setIDUser($this);
        }

        return $this;
    }

    public function removeIDFood(UserFood $iDFood): self
    {
        if ($this->IDFood->removeElement($iDFood)) {
            // set the owning side to null (unless already changed)
            if ($iDFood->getIDUser() === $this) {
                $iDFood->setIDUser(null);
            }
        }

        return $this;
    }

  
  
}
