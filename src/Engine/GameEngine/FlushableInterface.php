<?php
/**
 * An interface that provides the engine with basic game capabilities.
 *
 * ~
 *
 * @category   Interfaces
 * @package    App\Engine
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Engine\GameEngine;

use App\Model\Round\RoundInterface;

interface FlushableInterface
{
    /**
     * @param RoundInterface $gameRound
     * @return mixed
     */
    public function flush(RoundInterface $gameRound);
}