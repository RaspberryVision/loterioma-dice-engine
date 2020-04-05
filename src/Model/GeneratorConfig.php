<?php
/**
 * A container for the Random Number Generator configuration.
 *
 * ~
 *
 * @category   DTO
 * @package    App\Model\DTO
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Model;

class GeneratorConfig
{
    /**
     * @var int
     */
    private int $seed;

    /**
     * @var int
     */
    private int $min;

    /**
     * @var int
     */
    private int $max;

    /**
     * @var array
     */
    private array $format;

    /**
     * @return int
     */
    public function getSeed(): ?int
    {
        return $this->seed;
    }

    /**
     * @param int $seed
     * @return GeneratorConfig
     */
    public function setSeed(int $seed): GeneratorConfig
    {
        $this->seed = $seed;
        return $this;
    }

    /**
     * @return int
     */
    public function getMin(): ?int
    {
        return $this->min;
    }

    /**
     * @param int $min
     * @return GeneratorConfig
     */
    public function setMin(int $min): GeneratorConfig
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return int
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @param int $max
     * @return GeneratorConfig
     */
    public function setMax(int $max): GeneratorConfig
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return array
     */
    public function getFormat(): ?array
    {
        return $this->format;
    }

    /**
     * @param array $format
     * @return GeneratorConfig
     */
    public function setFormat(array $format): GeneratorConfig
    {
        $this->format = $format;
        return $this;
    }
}