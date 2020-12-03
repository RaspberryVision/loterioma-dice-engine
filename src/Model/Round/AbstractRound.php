<?php
/**
 * An class representing an object of a specific GameRound in the Game.
 *
 * ~
 *
 * @category   AbstractModels
 * @package    App\Model
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Model\Round;

use App\Model\DTO\NormalizableBodyInterface;
use App\Model\Game\GameInterface;
use App\Model\ResultState\AbstractResultState;
use App\Model\ResultState\ResultStateInterface;

/**
 * @todo Short description
 * @category   @todo Add category
 * @package    App\Model\Round
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
abstract class AbstractRound implements RoundInterface, NormalizableBodyInterface
{
    public const STATUS_DRAWN = 0;
    public const STATUS_LOST = 1;
    public const STATUS_WON = 2;

    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var int $bet
     */
    protected int $bet;

    /**
     * @var GameInterface $game The game the round is for.
     */
    protected GameInterface $game;

    /**
     * @var int $status Represents the status of the game in terms of win.
     */
    protected int $status;

    /**
     * @var int $balance The balance status in round.
     */
    protected int $balance;

    /**
     * @var AbstractResultState $result
     */
    protected AbstractResultState $result;

    /**
     * AbstractGameRound constructor.
     * @param GameInterface $game
     * @param ResultStateInterface $result
     */
    public function __construct(GameInterface $game, ResultStateInterface $result)
    {
        $this->status = self::STATUS_DRAWN;
        $this->game = $game;
        $this->result = $result;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getBet(): int
    {
        return $this->bet;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return AbstractResultState
     */
    abstract public function getResult(): AbstractResultState;

    /**
     * If $status != STATUS_INIT return true - gameRound is ended,
     * otherwise return false.
     *
     * @return bool
     */
    public function isEnded(): bool
    {
        if (self::STATUS_DRAWN === $this->getStatus()) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     * @todo Short description
     */
    public function printInfo(): array
    {
        return [
            'result' => $this->result->getMatrix(),
            'status' => $this->status
        ];
    }

    public function normalizeBody()
    {
        return $this->printInfo();
    }
}