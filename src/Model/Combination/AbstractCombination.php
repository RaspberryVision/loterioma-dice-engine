<?php

namespace App\Model\Combination;

/**
 * An abstract definition of winning combination.
 * @category   Models
 * @package    App\Model\Combination
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
abstract class AbstractCombination implements CombinationInterface
{
    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var string $name Human name of winning combination.
     */
    protected string $name;

    /**
     * @var int $order Order in two wins collision.
     */
    protected int $order;

    /**
     * AbstractCombination constructor.
     * @param string $name
     * @param int $order
     */
    public function __construct(string $name, int $order)
    {
        $this->name = $name;
        $this->order = $order;
    }

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
    public function getOrder(): int
    {
        return $this->order;
    }
}