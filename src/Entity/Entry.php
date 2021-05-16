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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Entry")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=EntryFood::class, mappedBy="IDEntry")
     */
    private $entries;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Entry_id")
     */
    private $EntryUsers;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->entries = new ArrayCollection();
        $this->EntryUsers = new ArrayCollection();
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
     * @return Collection|EntryFood[]
     */
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    public function addEntry(EntryFood $Entry): self
    {
        if (!$this->entries->contains($Entry)) {
            $this->entries[] = $Entry;
            $Entry->setIDEntry($this);
        }

        return $this;
    }

    public function removeEntry(EntryFood $Entry): self
    {
        if ($this->entries->removeElement($Entry)) {
            // set the owning side to null (unless already changed)
            if ($Entry->getIDEntry() === $this) {
                $Entry->setIDEntry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getEntryUsers(): Collection
    {
        return $this->EntryUsers;
    }

    public function addEntryUser(User $EntryUser): self
    {
        if (!$this->EntryUsers->contains($EntryUser)) {
            $this->EntryUsers[] = $EntryUser;
            $EntryUser->setEntryId($this);
        }

        return $this;
    }

    public function removeEntryUser(User $EntryUser): self
    {
        if ($this->EntryUsers->removeElement($EntryUser)) {
            // set the owning side to null (unless already changed)
            if ($EntryUser->getEntryId() === $this) {
                $EntryUser->setEntryId(null);
            }
        }

        return $this;
    }

}
