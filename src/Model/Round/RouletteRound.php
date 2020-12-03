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

use App\Model\Bet\DiceBet;
use App\Model\Bet\RouletteBet;
use App\Model\Game\GameInterface;
use App\Model\ResultState\AbstractResultState;
use App\Model\ResultState\DiceResultState;
use App\Model\ResultState\ResultStateInterface;

/**
 * @todo Short description
 * @category   @todo Add category
 * @package    App\Model\Round
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class RouletteRound extends AbstractRound
{
    /**
     * @var array $bets The numbers and amounts that the player bets.
     */
    private array $bets;

    /**
     * AbstractGameRound constructor.
     * @param GameInterface $game
     * @param int $bet
     * @param ResultStateInterface $result
     * @param array $bets
     */
    public function __construct(GameInterface $game, int $bet, ResultStateInterface $result, array $bets)
    {
        parent::__construct($game, $bet, $result);
        $this->setBets($bets);
    }

    /**
     * If $status != STATUS_INIT return true - gameRound is ended,
     * otherwise return false.
     *
     * @return bool
     */
    public function isEnded(): bool
    {
        return !(self::STATUS_DRAWN === $this->getStatus());
    }

    /**
     * @return array
     */
    public function getBets(): array
    {
        return $this->bets;
    }

    /**
     * @param $bets
     * @todo Short description
     */
    private function setBets($bets)
    {
        foreach ($bets as $bet) {
            $this->bets [] = new RouletteBet(
                sprintf('Bet for number %d stake %d', $bet['number'], $bet['stake']),
                0,
                $bet['stake'],
                $bet['number']
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function getResult(): AbstractResultState
    {
        return $this->result;
    }
}