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

use App\Model\Game\GameInterface;
use App\Model\ResultState\AbstractResultState;
use App\Model\ResultState\ResultStateInterface;
use App\Model\ResultState\SlotsResults;
use App\Model\ResultState\SlotsResultState;

/**
 * @todo Short description
 * @category   @todo Add category
 * @package    App\Model\Round
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class SlotsRound extends AbstractRound
{
    /**
     * @var array $combinations Collection of winning combination.
     */
    private array $combinations;

    /**
     * AbstractGameRound constructor.
     * @param GameInterface $game
     * @param int $bet
     * @param ResultStateInterface $result
     * @param array $combinations
     */
    public function __construct(GameInterface $game, int $bet, ResultStateInterface $result, array $combinations)
    {
        parent::__construct($game, $bet, $result);
        $this->combinations = $combinations;
    }

    /**
     * @param array $combination
     */
    public function addCombination(array $combination)
    {
        $this->wonCombinations [] = $combination;
        $this->balance += 5;
    }

    /**
     * @inheritDoc
     */
    public function getResult(): SlotsResultState
    {
        return $this->result;
    }
}