<?php

namespace App\Engine\GameEngine;

use App\Model\Round\RoundInterface;

interface SimulableInterface
{
    public function simulate(RoundInterface $gameRound): bool;
}