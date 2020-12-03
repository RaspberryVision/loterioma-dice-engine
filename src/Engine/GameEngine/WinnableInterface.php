<?php
/**
 * An interface that provides the engine method to check that user won.
 *
 * ~
 *
 * @category   Interfaces
 * @package    App\Engine
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Engine\GameEngine;

use App\Model\Round\AbstractRound;

/**
 * @todo Short description
 */
interface WinnableInterface
{
    /**
     * @param AbstractRound $gameRound
     * @return mixed
     */
    public function winning(AbstractRound $gameRound);
}