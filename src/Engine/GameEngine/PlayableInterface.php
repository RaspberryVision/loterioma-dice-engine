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

use App\Model\DTO\Game\GameRequestInterface;
use App\Model\Round\AbstractRound;
use App\Model\Round\RoundInterface;

/**
 * @todo Short description
 */
interface PlayableInterface
{
    /**
     * A method implementing the logic of a single round in the game.
     *
     * @param GameRequestInterface $gameRequest
     * @return AbstractRound
     */
    public function play(GameRequestInterface $gameRequest): AbstractRound;
}