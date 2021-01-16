<?php

namespace App\Entity;

use App\Repository\ResultStateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultStateRepository::class)
 */
class ResultState
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $matrix = [];

    /**
     * @ORM\OneToMany(targetEntity=Bet::class, mappedBy="resultState")
     */
    private $wonBets;

    public function __construct(?array $matrix = [])
    {
        $this->matrix = $matrix;
        $this->wonBets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatrix(): ?array
    {
        return $this->matrix;
    }

    public function setMatrix(?array $matrix): self
    {
        $this->matrix = $matrix;

        return $this;
    }

    /**
     * @return Collection|Bet[]
     */
    public function getWonBets(): Collection
    {
        return $this->wonBets;
    }

    public function addWonBet(Bet $wonBet): self
    {
        if (!$this->wonBets->contains($wonBet)) {
            $this->wonBets[] = $wonBet;
            $wonBet->setResultState($this);
        }

        return $this;
    }

    public function removeWonBet(Bet $wonBet): self
    {
        if ($this->wonBets->removeElement($wonBet)) {
            // set the owning side to null (unless already changed)
            if ($wonBet->getResultState() === $this) {
                $wonBet->setResultState(null);
            }
        }

        return $this;
    }

    public function printMatched()
    {
        $results = [];
        foreach ($this->getWonBets() as $item) {
            $results[] = [
                'rate' => $item->getRate(),
                'number' => $item->getNumber()
            ];
        }
        return $results;
    }

    /**
     * Get the value of a specific matrix cell.
     * @param int $x
     * @param int $y
     * @return int
     */
    public function getValue(int $x, int $y): int
    {
        return $this->matrix[$x][$y] ?? -1;
    }
}
