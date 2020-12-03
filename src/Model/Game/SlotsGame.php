<?php
/**
 * An class representing an object of a specific Slots Game.
 *
 * The object describing the configuration of the gaming machine denotes symbols,
 * available rates, paid lines as well as the size of the game matrix itself,
 *
 * @category   AbstractModels
 * @package    App\Model
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Model\Game;

use App\Model\Payline\SlotsPayline;

/**
 * Implementation of the casino slot machine game engine.
 * @category   Models
 * @package    App\Model\Game
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class SlotsGame extends AbstractGame
{
    public const GAME_TYPE = 1;

    /** @var array $symbols */
    private array $symbols;

    /** @var SlotsPayline[] $combinations */
    private array $combinations;

    /**
     * SlotsGame constructor.
     * @param string $name
     * @param int $type
     * @param int $min
     * @param int $max
     * @param array $format
     * @param array $symbols
     * @param array $combinations
     * @param array $bets
     */
    public function __construct(
        string $name,
        int $type,
        int $min,
        int $max,
        array $format,
        array $bets,
        array $symbols,
        array $combinations
    )
    {
        parent::__construct($name, $type, $min, $max, $format, $bets);
        $this->setCombinations($combinations);
        $this->symbols = $symbols;
    }

    /**
     * @return array
     */
    public function getSymbols(): array
    {
        return $this->symbols;
    }

    /**
     * @return SlotsPayline[]
     */
    public function getCombinations(): array
    {
        return $this->combinations;
    }

    private function setCombinations(array $combinations)
    {
        foreach ($combinations as $combination) {
            $this->addCombination($combination);
        }
    }

    public function addCombination(array $combination) {
        $this->combinations[] = new SlotsPayline(
            $combination['name'],
            $combination['order'],
            $combination['items']
        );
    }
}