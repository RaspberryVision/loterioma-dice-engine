<?php

namespace App\Engine\Utils;

use App\Model\Bet;
use App\Model\Round;
use App\Model\RoundResult;

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
        if ($round->getResult()) {
            foreach ($round->getBets() as $bet) {
                if ($this->checkBet($round->getResult(), $bet)) {
                    $bet->setStatus(2);
                }
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