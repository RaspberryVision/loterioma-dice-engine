<?php

/**
 * SlotsGameCombinationItem - @todo One sentence about that.
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
 * 03:30 21.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\PaylineItem;

use App\Model\ItemPosition\ItemPositionInterface;
use App\Model\ItemPosition\SlotsItemPosition;

/**
 * @todo Short description
 * @category   @todo Add category
 * @package    App\Model\CombinationItem
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class SlotsPaylineItem extends AbstractPaylineItem
{
    /**
     * Get value of specific cell.
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}