<?php

/**
 * BetInterface - @todo One sentence about that.
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
 * 04:33 22.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Bet;

use App\Model\Combination\CombinationInterface;

/**
 * An interface specifying the possible operations available on the plant
 * facility (understood as the contract who is right).
 */
interface BetInterface extends CombinationInterface
{
    public function getRate(): int;
}