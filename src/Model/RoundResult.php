<?php

namespace App\Model;

/**
 * An object representing the result of a given round.
 * @category   Model
 * @package    App\Model
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class RoundResult
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * The number of dice in a given round.
     * @var int
     */
    private int $winningNumber;

    /**
     * The date the object was created, it is the date close to the date of the game.
     *
     */
    private ?\DateTimeInterface $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWinningNumber(): ?int
    {
        return $this->winningNumber;
    }

    public function setWinningNumber(int $winningNumber): self
    {
        $this->winningNumber = $winningNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
