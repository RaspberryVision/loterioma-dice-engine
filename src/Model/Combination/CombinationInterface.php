<?php
/**
 * An interface specifying the operations available on the winning combination.
 *
 * It provides us with access to the components of the combination,
 * also allows access to the field determining the priority of the combination.
 *
 * @category   Interfaces
 * @package    App\Model\GameCombination
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Model\Combination;

/**
 * An interface specifying the operations available on the winning combination.
 */
interface CombinationInterface
{
    /**
     * Get combination name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Return the hierarchical order of the combination, the highest value is 0.
     *
     * @return int
     */
    public function getOrder(): int;
}