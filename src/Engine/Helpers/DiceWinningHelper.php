<?php

/**
 * WinningHelper - @todo One sentence about that.
 *
 * @todo add file description
 *
 * See more: @todo add documentation link
 *
 * Engine - casino game server.
 * @see https://github.com/RaspberryVision/loterioma-engine
 *
 * This code is part of the LoterioMa casino system.
 * @see https://github.com/RaspberryVision/loterioma
 *
 * Created by Rafal Malik.
 * 23:08 21.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Engine\Helpers;

use App\Model\Bet\DiceBet;
use App\Model\Combination\DiceCombination;
use App\Model\ResultState\DiceResultState;
use App\Model\Round\AbstractRound;
use App\Model\Round\DiceRound;
use App\Model\Round\RoundInterface;
use App\Model\Round\SlotsRound;

/**
 * Helper enabling checking if the winning conditions have been met.
 * @category   EngineHelpers
 * @package    App\Engine\Helpers
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class DiceWinningHelper extends AbstractWinningHelper
{
    /**
     * The process of analyzing opportunities for winners.
     * @param AbstractRound $round
     * @return AbstractRound
     */
    public function checkWinnings(DiceRound $round): RoundInterface
    {
        // Default round is lost.
        $round->setStatus(AbstractRound::STATUS_LOST);

        /** @var DiceBet $bet */
        foreach ($round->getBets() as $bet) {
            if ($this->checkBet($round->getResult(), $bet)) {
                $round->getResult()->addMatched($bet);
                $round->setStatus(AbstractRound::STATUS_WON);
            }
        }

        return $round;
    }

    /**
     * @param DiceResultState $matrix
     * @param DiceBet $bet
     * @return bool
     */
    private function checkBet(DiceResultState $matrix, DiceBet $bet): bool
    {
        return $bet->getNumber() === $matrix->getValue(0, 0);
    }
}