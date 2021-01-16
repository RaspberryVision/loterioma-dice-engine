<?php

namespace App\Entity;

use App\Repository\RoundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoundRepository::class)
 */
class Round
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Bet::class, mappedBy="round")
     */
    private $bets;

    /**
     * @ORM\Column(type="float")
     */
    private $balance;

    /**
     * @ORM\OneToOne(targetEntity=ResultState::class, cascade={"persist", "remove"})
     */
    private $result;

    /**
     * @ORM\OneToOne(targetEntity=Game::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;

    public function __construct(Game $game, array $bets, ResultState $resultState = null)
    {
        $this->game = $game;
        $this->result = $resultState;
        $this->status = 0;
        $this->setBets($bets);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Bet[]
     */
    public function getBets()
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): self
    {
        if (!$this->bets->contains($bet)) {
            $this->bets[] = $bet;
            $bet->setRound($this);
        }

        return $this;
    }

    public function removeBet(Bet $bet): self
    {
        if ($this->bets->removeElement($bet)) {
            // set the owning side to null (unless already changed)
            if ($bet->getRound() === $this) {
                $bet->setRound(null);
            }
        }

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getResult(): ?ResultState
    {
        return $this->result;
    }

    public function setResult(?ResultState $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function printInfo(): array
    {
        return [
            'result' => $this->result->getMatrix(),
            'status' => $this->status,
            'matched' => $this->getResult()->printMatched()
        ];
    }

    /**
     * @param $bets
     * @todo Short description
     */
    private function setBets($bets)
    {
        $this->bets = new ArrayCollection();
        foreach ($bets as $bet) {
            $this->addBet(new Bet(
                $bet['number'],
                $bet['amount']
            ));
        }
    }
}
