<?php


namespace App\Model;

/**
 * A model representing the user's bet in the game of dice.
 * @category   Model
 * @package    App\Model
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class Bet
{
    public const STATUS_PENDING = 0;
    public const STATUS_LOST = 1;
    public const STATUS_WIN = 2;

    /**
     * @var int
     */
    private ?int $id;

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

    /**
     * Bet constructor.
     * @param int|null $stake
     * @param int|null $number
     * @param int $member
     */
    public function __construct(?int $stake, ?int $number, int $member)
    {
        $this->id = null;
        $this->status = self::STATUS_PENDING;
        $this->hash = uniqid('b_dice_', true);
        $this->stake = $stake;
        $this->number = $number;
        $this->member = $member;
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
     * @return Bet
     */
    public function setId(int $id): Bet
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return $this
     */
    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStake(): ?int
    {
        return $this->stake;
    }

    /**
     * @param int $stake
     * @return $this
     */
    public function setStake(int $stake): self
    {
        $this->stake = $stake;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return $this
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getMember(): int
    {
        return $this->member;
    }

    /**
     * @param int $member
     * @return $this
     */
    public function setMember(int $member): self
    {
        $this->member = $member;

        return $this;
    }
}
