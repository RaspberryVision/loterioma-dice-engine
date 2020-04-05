<?php


namespace App\Model\Store\Dice;

/**
 * A model representing the user's bet in the game of dice.
 * @category   Model
 * @package    App\Model\Store\Dice
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class Bet
{
    /**
     * @var int
     */
    private int $id;

    /**
     * Bet unique alphanumerical hash.
     * @var string
     */
    private string $hash;

    /**
     * Bet rate as an integer.
     * @var int|null
     */
    private ?int $stake;

    /**
     * Number required in a coupon.
     * @var int|null
     */
    private ?int $number;

    /**
     * The status of the bet, whether it has already been settled and with what result.
     * @var int|null
     */
    private ?int $status;

    /**
     * User who is the owner of the bet.
     * @var int
     */
    private int $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getStake(): ?int
    {
        return $this->stake;
    }

    public function setStake(int $stake): self
    {
        $this->stake = $stake;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
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

    public function getMember(): int
    {
        return $this->member;
    }

    public function setMember(?int $member): self
    {
        $this->member = $member;

        return $this;
    }
}
