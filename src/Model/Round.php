<?php

namespace App\Model;

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
     * @var int|null
     */
    private ?int $id;

    /**
     * @var Game|null
     */
    private ?Game $game;

    /**
     * @var RoundResult
     */
    private ?RoundResult $result;

    /**
     * @var Bet[]|null
     */
    private ?array $bets;

    /**
     * @var array|null
     */
    private ?array $parameters;

    /**
     * Round constructor.
     * @param Game $game
     * @param RoundResult|null $result
     * @param array|null $parameters
     */
    public function __construct(
        Game $game,
        array $parameters = null,
        RoundResult $result = null
    )
    {
        $this->id = null;
        $this->game = $game;
        $this->parameters = $parameters;
        $this->result = $result;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Round
     */
    public function setId(int $id): Round
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     * @return $this
     */
    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return RoundResult|null
     */
    public function getResult(): ?RoundResult
    {
        return $this->result;
    }

    /**
     * @param RoundResult|null $result
     * @return $this
     */
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

    /**
     * @param Bet $bet
     * @return $this
     */
    public function addBet(Bet $bet): self
    {
        $this->bets[] = $bet;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    /**
     * @param array|null $parameters
     * @return $this
     */
    public function setParameters(?array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
