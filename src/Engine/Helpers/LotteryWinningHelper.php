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
use App\Model\Bet\LotteryBet;
use App\Model\Bet\RouletteBet;
use App\Model\Combination\DiceCombination;
use App\Model\ResultState\DiceResultState;
use App\Model\ResultState\LotteryResultState;
use App\Model\ResultState\RouletteResultState;
use App\Model\Round\AbstractRound;
use App\Model\Round\DiceRound;
use App\Model\Round\LotteryRound;
use App\Model\Round\RouletteRound;
use App\Model\Round\RoundInterface;
use App\Model\Round\SlotsRound;

/**
 * Helper enabling checking if the winning conditions have been met.
 * @category   EngineHelpers
 * @package    App\Engine\Helpers
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class LotteryWinningHelper extends AbstractWinningHelper
{
    /**
     * The process of analyzing opportunities for winners.
     * @param RouletteRound $round
     * @return AbstractRound
     */
    public function checkWinnings(LotteryRound $round): RoundInterface
    {
        /** @var DiceBet $bet */
        foreach ($round->getBets() as $bet) {
            if ($this->checkBet($round->getResult(), $bet)) {
                $round->getResult()->addMatched($bet);
            }
        }

        return $round;
    }

    /**
     * @param LotteryResultState $matrix
     * @param LotteryBet $bet
     * @return bool
     */
    private function checkBet(LotteryResultState $matrix, LotteryBet $bet): bool
    {
        foreach ($matrix as $counter => $winNumber) {
            if (!in_array($matrix->getValue(0, $counter), $bet->getNumbers())) {
                return false;
            }
        }

       return true;
    }
}