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

/**
 * Object for game play action params.
 * @category   Models
 * @package    App\Model\DTO
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class GameRequest
{
    /**
     * @var int $gameId Unique game hash.
     */
    private int $gameId;

    /**
     * @var string $client Client app hash.
     */
    private string $client;

    /**
     * @var int $userId
     */
    private int $userId;

    /**
     * @var int $mode Specific game mode.
     */
    private int $mode;

    /**
     * @var array $parameters
     */
    private array $parameters;

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getMode(): int
    {
        return $this->mode;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param int $gameId
     * @return GameRequest
     */
    public function setGameId(int $gameId): GameRequest
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * @param string $client
     * @return GameRequest
     */
    public function setClient(string $client): GameRequest
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param int $userId
     * @return GameRequest
     */
    public function setUserId(int $userId): GameRequest
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param int $mode
     * @return GameRequest
     */
    public function setMode(int $mode): GameRequest
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @param array $parameters
     * @return GameRequest
     */
    public function setParameters(array $parameters): GameRequest
    {
        $this->parameters = $parameters;

        return $this;
    }
}