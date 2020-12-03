<?php

namespace App\Model\ResultState;

use App\Model\Combination\CombinationInterface;
use App\Model\DTO\Network\NetworkResponseInterface;
use App\Model\GameResultMatrix\AbstractGameResultMatrix;
use App\Model\GameResultMatrix\SlotsResultMatrix;

/**
 * An abstract model of the game result.
 * @category   Models
 * @package    App\Model\GameResult
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
abstract class AbstractResultState implements ResultStateInterface
{
    /** @var array|null $matrix */
    protected ?array $matrix;

    /** @var array $matched */
    protected array $matched;

    /**
     * AbstractGameResult constructor.
     * @param NetworkResponseInterface $networkResponse
     */
    public function __construct(NetworkResponseInterface $networkResponse)
    {
        $this->matrix = $networkResponse->getBody();
        $this->matched = [];
    }

    /**
     * @param CombinationInterface $combination
     */
    public function addMatched(CombinationInterface $combination)
    {
        $this->matched[] = $combination;
    }

    /**
     * Get the value of a specific matrix cell.
     * @param int $x
     * @param int $y
     * @return int
     */
    public function getValue(int $x, int $y): int
    {
        return $this->matrix[$x][$y] ?? -1;
    }

    /**
     * Return the result matrix.
     * @return array
     */
    public function getMatrix(): array
    {
        return $this->matrix;
    }

    /**
     * @return array
     */
    public function getMatched(): array
    {
        return $this->matched;
    }

    /**
     * @param array $matched
     * @return AbstractResultState
     */
    public function setMatched(array $matched): AbstractResultState
    {
        $this->matched = $matched;

        return $this;
    }

    public function printMatched()
    {
        $results = [];
        foreach ($this->getMatched() as $item) {
            $results[] = [
                'rate' => $item->getRate(),
                'number' => $item->getNumber()
            ];
        }
        return $results;
    }
}