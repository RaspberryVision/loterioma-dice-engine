<?php

namespace App\Model;

use App\Model\Store\Dice\Bet;

/**
 * Object representing one game of dice.
 * @category   Model
 * @package    App\Model
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class Round
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private ?int $game;

    /**
     * @var RoundResult
     */
    private ?RoundResult $result;

    /**
     * @var Bet[]
     */
    private array $bets;

    /**
     * @var array
     */
    private array $parameters = [];

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGame(): ?int
    {
        return $this->game;
    }

    public function setGame(?int $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function getResult(): ?RoundResult
    {
        return $this->result;
    }

    public function setResult(?RoundResult $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Bet[]
     */
    public function getBets(): array
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): self
    {
        if (!$this->bets->contains($bet)) {
            $this->bets[] = $bet;
        }

        return $this;
    }

    public function removeBet(Bet $bet): self
    {
        if ($this->bets->contains($bet)) {
            $this->bets->removeElement($bet);
        }

        return $this;
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    public function setParameters(?array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
