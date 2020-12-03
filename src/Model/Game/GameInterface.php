<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.03.20
 * Time: 20:18
 */

namespace App\Model\Game;

use App\Model\DTO\Game\GeneratorConfig;

interface GameInterface
{
    public function getName(): string;

    public function getType(): int;

    public function getGeneratorConfig(): GeneratorConfig;
}