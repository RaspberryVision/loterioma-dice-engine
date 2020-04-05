<?php

namespace App\Model;

use App\Model\GeneratorConfig;

/**
 * Game model, provide basic properties and methods.
 * The game is called the engine configuration object, according to
 * which the game is played and the winnings are counted.
 *
 * @category   Model
 * @package    App\Model
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class Game
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @var int $type
     */
    private int $type;

    /**
     * @var GeneratorConfig
     */
    private GeneratorConfig $generatorConfig;

    /** @var array $rates */
    private array $rates = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Game
     */
    public function setId(int $id): Game
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Game
     */
    public function setName(string $name): Game
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Game
     */
    public function setType(int $type): Game
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return GeneratorConfig
     */
    public function getGeneratorConfig(): GeneratorConfig
    {
        return $this->generatorConfig;
    }

    /**
     * @param GeneratorConfig $generatorConfig
     * @return Game
     */
    public function setGeneratorConfig(GeneratorConfig $generatorConfig): Game
    {
        $this->generatorConfig = $generatorConfig;
        return $this;
    }

    /**
     * @return array
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param array $rates
     * @return Game
     */
    public function setRates(array $rates): Game
    {
        $this->rates = $rates;
        return $this;
    }
}