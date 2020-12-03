<?php

/**
 * DiceBet - @todo One sentence about that.
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
 * 04:55 22.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Bet;

/**
 * The class representing the object of the bookmaker's bet on the dice roll.
 * The bet consists of field and stake.
 * @category   Models
 * @package    App\Model\Bet
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class RouletteBet extends AbstractBet implements RouletteBetInterface
{
    /**
     * @var int $number
     */
    private int $number;

    /**
     * DiceBet constructor.
     * @param string $name
     * @param int $order
     * @param int $rate
     * @param int $number
     */
    public function __construct(string $name, int $order, int $rate, int $number)
    {
        parent::__construct($name, $order, $rate);
        $this->number = $number;
    }

    /**
     * @return int
     * @todo Short description
     */
    public function getNumber(): int
    {
        return $this->number;
    }
}