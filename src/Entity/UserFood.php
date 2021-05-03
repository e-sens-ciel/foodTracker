<?php

namespace App\Entity;

use App\Repository\UserFoodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserFoodRepository::class)
 */
class UserFood
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="IDFood")
     */
    private $IDUser;

    /**
     * @ORM\ManyToOne(targetEntity=Food::class)
     */
    private $IDFood;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDUser(): ?user
    {
        return $this->IDUser;
    }

    public function setIDUser(?user $IDUser): self
    {
        $this->IDUser = $IDUser;

        return $this;
    }

    public function getIDFood(): ?Food
    {
        return $this->IDFood;
    }

    public function setIDFood(?Food $IDFood): self
    {
        $this->IDFood = $IDFood;

        return $this;
    }
}
