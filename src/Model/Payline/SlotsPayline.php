<?php

/**
 * SlotsGameCombination - single line which win.
 *
 * The class represents a single winning combination in the game.
 * It consists of fields in which the same symbols must appear in
 * order for a given combination to be fulfilled.
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
 * 02:52 21.03.2020, Warsaw/Zabki - DELL
 */

namespace App\Model\Payline;

use App\Model\Combination\AbstractCombination;
use App\Model\PaylineItem\SlotsPaylineItem;

/**
 * Combination object (understood as a line in the game matrix).
 * @category   Models
 * @package    App\Model\Combination
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class SlotsPayline extends AbstractCombination
{
    /**
     * @var SlotsPaylineItem[]
     */
    protected array $items;

    /**
     * SlotsCombination constructor.
     * @param string $name
     * @param int $order
     * @param SlotsPaylineItem[]|array $items
     */
    public function __construct(string $name, int $order, array $items)
    {
        parent::__construct($name, $order);
        $this->setItems($items);
    }

    /**
     * Set array to CombinationItemInterface.
     *
     * @param array $items
     * @return mixed
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new SlotsPaylineItem($item[0], $item[1]);
        }
    }

    /**
     * The whole combination must consist of one symbol, so they downloaded the first one
     * that will serve as a template when checking the next item combination.
     */
    public function getWinningSymbol()
    {

    }
}