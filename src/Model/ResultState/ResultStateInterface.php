<?php

namespace App\Model\ResultState;

/**
 * An interface describing the possible operations on the object results of the game.
 */
interface ResultStateInterface
{
    public function getValue(int $x, int $y): int;

    public function getMatrix(): array;
}