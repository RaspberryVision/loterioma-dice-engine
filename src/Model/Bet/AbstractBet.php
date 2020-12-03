<?php

/**
 * AbstractBet - @todo One sentence about that.
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
 * 04:37 22.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Bet;

use App\Model\Combination\AbstractCombination;

/**
 * An abstract definition of a bet coupon.
 * @category   Models
 * @package    App\Model\Bet
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class AbstractBet extends AbstractCombination
{
    /**
     * @var $id int Unique identifier.
     */
    protected int $id;

    /**
     * @var int $rate
     */
    private int $rate;

    /**
     * AbstractBet constructor.
     * @param string $name
     * @param int $order
     * @param int $rate
     */
    public function __construct(string $name, int $order, int $rate)
    {
        parent::__construct($name, $order);
        $this->rate = $rate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }
}