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

use App\Model\Combination\CombinationInterface;
use App\Model\PaylineItem\PaylineItemInterface;
use App\Model\ResultState\ResultStateInterface;
use App\Model\Round\RoundInterface;
use App\Model\Round\SlotsRound;

/**
 * Helper enabling checking if the winning conditions have been met.
 * @category   EngineHelpers
 * @package    App\Engine\Helpers
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class SlotsWinningHelper implements \App\Engine\Helpers\WinningHelperInterface
{
    /**
     * @param RoundInterface $round
     * @return RoundInterface
     * @todo Short description
     */
    public function checkWinnings(RoundInterface $round): SlotsRound
    {
        return $round;
    }

    /**
     * @param RoundInterface $gameRound
     */
    private function checkWins(RoundInterface $gameRound)
    {
        foreach ($this->game->getCombinations() as $combination) {

            if ($this->checkCombination($gameRound->getResult(), $combination)) {
                $gameRound->getResult()->addCombination($combination);
            }
        }
    }

    /**
     * @param array $matrix
     * @param \App\Model\Combination\CombinationInterface $combination
     * @return bool
     */
    private function checkCombination(ResultStateInterface $result, CombinationInterface $combination): bool
    {
        $winningNumber = $result->getValue($combination->getInitialItem());

        /** @var PaylineItemInterface $item */
        foreach ($combination->getItems() as $item) {

            if ($matrix->getItemValue($item) !== $winningNumber) {
                return false;
            }
        }

        return true;
    }
}