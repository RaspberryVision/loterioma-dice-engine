<?php

/**
 * DiceGame - @todo One sentence about that.
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
 * 19:52 21.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Game;

use App\Model\Bet\DiceBet;

/**
 * Implementation of the cube game engine. The cube has X stitches,
 * the player bets the boxes and then the draw takes place.
 * @category   Models
 * @package    App\Model\Game
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class DiceGame extends AbstractGame
{
    public const GAME_TYPE = 2;

    /** @var DiceBet[] $bets */
    private array $bets;

    /**
     * @return DiceBet[]
     */
    public function getBets(): array
    {
        return $this->bets;
    }
}