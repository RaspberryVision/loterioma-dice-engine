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

namespace App\Engine\Utils;

use App\Model\Round;
use App\Model\RoundResult;
use App\Model\Store\Dice\Bet;

/**
 * Helper enabling checking if the winning conditions have been met.
 * @category   EngineHelpers
 * @package    App\Engine\Helpers
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class BetChecker
{
    /**
     * The process of analyzing opportunities for winners.
     * @param Round $round
     * @return Round
     */
    public function process(Round $round): Round
    {
        foreach ($round->getBets() as $bet) {
            if ($this->checkBet($round->getResult(), $bet)) {
                $bet->setStatus(2);
            }
        }

        return $round;
    }

    /**
     * @param RoundResult $roundResult
     * @param Bet $bet
     * @return bool
     */
    private function checkBet(RoundResult $roundResult, Bet $bet): bool
    {
        return $bet->getNumber() === $roundResult->getWinningNumber();
    }
}