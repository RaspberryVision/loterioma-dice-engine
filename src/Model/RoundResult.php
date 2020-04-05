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

    /**
     * RoundResult constructor.
     * @param array $matrix
     */
    public function __construct(array $matrix)
    {
        $this->id = null;
        $this->winningNumber = $matrix[0][0] ?? -1;
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return RoundResult
     */
    public function setId(?int $id): RoundResult
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWinningNumber(): ?int
    {
        return $this->winningNumber;
    }

    /**
     * @param int $winningNumber
     * @return $this
     */
    public function setWinningNumber(int $winningNumber): self
    {
        $this->winningNumber = $winningNumber;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
