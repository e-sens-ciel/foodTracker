<?php

namespace App\Entity;

use App\Repository\FoodRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FoodRepository::class)
 */
class Food
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $grams;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $proteins;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lipids;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $glucides;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $energies;

    /**
     * @ORM\OneToMany(targetEntity=EntryFood::class, mappedBy="IDFood")
     */
    private $entryFood;

    public function __construct()
    {
        $this->entryFood = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity=UserFood::class, mappedBy="IDAliment")
     */



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

    public function getGrams(): ?float
    {
        return $this->grams;
    }

    public function setGrams(?float $grams): self
    {
        $this->grams = $grams;

        return $this;
    }

    public function getProteins(): ?float
    {
        return $this->proteins;
    }

    public function setProteins(?float $proteins): self
    {
        $this->proteins = $proteins;

        return $this;
    }

    public function getLipids(): ?float
    {
        return $this->lipids;
    }

    public function setLipids(?float $lipids): self
    {
        $this->lipids = $lipids;

        return $this;
    }

    public function getGlucides(): ?float
    {
        return $this->glucides;
    }

    public function setGlucides(?float $glucides): self
    {
        $this->glucides = $glucides;

        return $this;
    }

    public function getEnergies(): ?float
    {
        return $this->energies;
    }

    public function setEnergies(?float $energies): self
    {
        $this->energies = $energies;

        return $this;
    }

    /**
     * @return Collection|EntryFood[]
     */
    public function getEntryFood(): Collection
    {
        return $this->entryFood;
    }

    public function addEntryFood(EntryFood $entryFood): self
    {
        if (!$this->entryFood->contains($entryFood)) {
            $this->entryFood[] = $entryFood;
            $entryFood->setIDFood($this);
        }

        return $this;
    }

    public function removeEntryFood(EntryFood $entryFood): self
    {
        if ($this->entryFood->removeElement($entryFood)) {
            // set the owning side to null (unless already changed)
            if ($entryFood->getIDFood() === $this) {
                $entryFood->setIDFood(null);
            }
        }

        return $this;
    }


}
