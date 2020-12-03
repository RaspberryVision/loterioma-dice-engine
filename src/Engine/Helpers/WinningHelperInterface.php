<?php

/**
 * WinningHelperInterface - @todo One sentence about that.
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
 * 01:37 22.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Engine\Helpers;

use App\Model\Round\AbstractRound;
use App\Model\Round\RoundInterface;

/**
 * An interface specifying the methods used to determine victory in the game.
 */
interface WinningHelperInterface
{
    /**
     * @param AbstractRound $round
     * @return mixed
     * @todo Short description
     */
    //public function checkWinnings(AbstractRound $round): RoundInterface;
}