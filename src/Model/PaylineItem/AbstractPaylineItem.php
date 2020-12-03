<?php

/**
 * GameCombinationItem - @todo One sentence about that.
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
 * 03:14 21.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\PaylineItem;

use App\Model\ItemPosition\ItemPositionInterface;
use App\Model\ItemPosition\SlotsItemPosition;

/**
 * @todo Short description
 * @category   Models
 * @package    App\Model\GameCombinationItem
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
abstract class AbstractPaylineItem implements PaylineItemInterface
{
    /**
     * @var $id int Unique identifier.
     */
    protected int $id;

    /**
     * @var int $positionX Coordinate X.
     */
    protected int $positionX;

    /**
     * @var int $positionY Coordinate Y.
     */
    protected int $positionY;

    /**
     * @var $value int Value of specific cell.
     */
    protected int $value;

    /**
     * GameCombinationItem constructor.
     * @param int $positionX
     * @param int $positionY
     * @param int $value
     */
    public function __construct(int $positionX, int $positionY, int $value = -1)
    {
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}