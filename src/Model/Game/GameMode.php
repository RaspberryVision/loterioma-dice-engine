<?php

/**
 * GameMode - @todo One sentence about that.
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
 * 20:14 22.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Game;

/**
 * Available game modes, they are for development and diagonal purposes.
 * @category   Models
 * @package    App\Model\Game
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
abstract class GameMode
{
    /**
     * Live works mode.
     */
    public const MODE_LIVE = 0;

    /**
     * Development mode - default during works.
     */
    public const MODE_DEV = 1;

    /**
     * Debug mode starts the game in simulation mode, it is necessary to provide
     * additional parameters of the game (its default final state)
     */
    public const MODE_DEBUG = 2;
}