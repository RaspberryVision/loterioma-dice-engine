<?php

/**
 * GameCombinationItemInterface - @todo One sentence about that.
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
 * 03:20 21.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\PaylineItem;

/**
 * Interface defined basic operation available on abstract item.
 */
interface PaylineItemInterface
{
    /**
     * Get unique identifier.
     * @return mixed
     */
    public function getId();

    /**
     * Value of specific combination,
     * @return int
     */
    public function getValue(): int;
}