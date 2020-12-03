<?php

/**
 * DiceBetInterface - @todo One sentence about that.
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
 * 05:13 22.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Bet;

/**
 * Interface defined that DIceBet must to contains getNumber method because
 * DiceBet assumed that we choose number.
 */
interface RouletteBetInterface extends BetInterface
{
    public function getNumber(): int;
}