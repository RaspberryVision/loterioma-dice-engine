<?php

namespace App\Model\Round;

use App\Model\ResultState\AbstractResultState;
use App\Model\ResultState\ResultStateInterface;

interface RoundInterface
{
    public function getStatus(): int;

    public function getBalance(): int;

    public function getResult(): ResultStateInterface;

    public function isEnded(): bool;

    public function printInfo();
}