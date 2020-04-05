<?php
/**
 * LoteriomaDiceEngine - application enabling the operation of gambling cubes.
 *
 * The application consists of a dice game engine based on a pseudo-randomity for which
 * the external RNG component is used. The application is only responsible for handling
 * the game logic and forwards its results to the Core component. Data used in the operation
 * of the application are downloaded from the DataStore component.
 *
 * See more: https://raspberryvision.github.io/loterioma-dice-engine/.
 *
 * DiceEngine - casino dice game server.
 * @see https://github.com/RaspberryVision/loterioma-dice-engine
 *
 * This code is part of the LoterioMa casino system.
 * @see https://github.com/RaspberryVision/loterioma
 *
 * Created by Rafal Malik.
 * 17:02 02.04.2020, Warsaw/Zabki - DELL
 */

namespace App\Utils;

/**
 * Class containing a set of auxiliary methods for operations on arrays.
 * @category   Helper
 * @package    App\Utils
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class ArrayHelper
{
    /**
     * Determine if two associative arrays are similar,
     * Both arrays must have the same indexes with identical values
     * without respect to key ordering,
     *
     * @param array $a
     * @param array $b
     * @return bool
     */
    public function areSimilar(array $a, array $b): bool
    {
        if (count(array_diff_assoc($a, $b))) {
            return false;
        }

        foreach ($a as $k => $v) {
            if ($v !== $b[$k]) {
                return false;
            }
        }

        return true;
    }
}