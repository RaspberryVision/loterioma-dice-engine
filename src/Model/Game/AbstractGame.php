<?php

/**
 * An abstract class representing an object of a specific Game.
 *
 * The game is called the engine configuration object, according to
 * which the game is played and the winnings are counted.
 *
 * @category   AbstractModels
 * @package    App\Model
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Model\Game;

use App\Model\DTO\Game\GeneratorConfig;

/**
 * Abstract game model, provide basic properties and methods.
 * @category   Models
 * @package    App\Model\Game
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
abstract class AbstractGame implements GameInterface
{
    protected const GAME_TYPE = -1;

    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var string $name
     */
    protected string $name;

    /**
     * @var int $type
     */
    protected int $type;

    /**
     * @var GeneratorConfig
     */
    private GeneratorConfig $generatorConfig;

    /** @var array $rates */
    private array $rates;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @return GeneratorConfig
     */
    public function getGeneratorConfig(): GeneratorConfig
    {
        return $this->generatorConfig;
    }

    /**
     * @param array $config
     * @return AbstractGame
     */
    public function setGeneratorConfig(array $config): AbstractGame
    {
        $this->generatorConfig = new GeneratorConfig(
            $config['seed'],
            $config['min'],
            $config['max'],
            $config['format']
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __set($name, $value): void
    {
        $this->$name = $value;
    }
}