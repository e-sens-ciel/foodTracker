<?php

namespace App\Entity;

use App\Repository\EntryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntryRepository::class)
 */
class Entry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $hour;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lipids;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $proteins;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $glucides;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $energies;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="entry")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=EntryFood::class, mappedBy="IDEntry")
     */
    private $entries;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->entries = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHour(): ?\DateTimeInterface
    {
        return $this->hour;
    }

    public function setHour(?\DateTimeInterface $hour): self
    {
        $this->hour = $hour;

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

    public function getProteins(): ?float
    {
        return $this->proteins;
    }

    public function setProteins(?float $proteins): self
    {
        $this->proteins = $proteins;

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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setEntry($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getEntry() === $this) {
                $user->setEntry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EntryFood[]
     */
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    public function addEntry(EntryFood $entry): self
    {
        if (!$this->entries->contains($entry)) {
            $this->entries[] = $entry;
            $entry->setIDEntry($this);
        }

        return $this;
    }

    public function removeEntry(EntryFood $entry): self
    {
        if ($this->entries->removeElement($entry)) {
            // set the owning side to null (unless already changed)
            if ($entry->getIDEntry() === $this) {
                $entry->setIDEntry(null);
            }
        }

        return $this;
    }

}
