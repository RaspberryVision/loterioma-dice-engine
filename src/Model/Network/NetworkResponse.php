<?php
/**
 * Container for the response object from network component.
 *
 * ~
 *
 * @category   DTO
 * @package    App\Model\DTO
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\Model\Network;

class NetworkResponse implements NetworkResponseInterface
{
    /**
     * @var string|null
     */
    private ?string $body;

    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var string
     */
    private string $requestHash;

    /**
     * RNGResponse constructor.
     * @param string|null $body
     * @param int $statusCode
     * @param string $requestHash
     */
    public function __construct(?string $body, int $statusCode, string $requestHash)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->requestHash = $requestHash;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getRequestHash(): string
    {
        return $this->requestHash;
    }
}