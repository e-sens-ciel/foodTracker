<?php

namespace App\Entity;

use App\Repository\EntryFoodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntryFoodRepository::class)
 */
class EntryFood
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=entry::class, inversedBy="entries")
     */
    private $IDEntry;

    /**
     * @ORM\ManyToOne(targetEntity=food::class, inversedBy="entryFood")
     */
    private $IDFood;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDEntry(): ?entry
    {
        return $this->IDEntry;
    }

    public function setIDEntry(?entry $IDEntry): self
    {
        $this->IDEntry = $IDEntry;

        return $this;
    }

    public function getIDFood(): ?food
    {
        return $this->IDFood;
    }

    public function setIDFood(?food $IDFood): self
    {
        $this->IDFood = $IDFood;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
