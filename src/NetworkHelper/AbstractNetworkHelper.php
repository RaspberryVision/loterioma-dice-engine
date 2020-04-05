<?php

namespace App\NetworkHelper;

use App\Model\Network\NetworkRequestInterface;
use App\Model\Network\NetworkResponse;
use App\Model\Network\NetworkResponseInterface;

/**
 * Abstract network helper. An abstract helper class that provides basic methods
 * for communicating with other components using an API.
 * @category   NetworkHelper
 * @package    App\NetworkHelper
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
abstract class AbstractNetworkHelper
{
    /** @var string $name */
    protected string $name;

    /** @var string $url */
    protected string $url;

    /** @var int $port */
    protected int $port;

    /**
     * AbstractNetworkHelper constructor.
     * @param string $name
     * @param string $url
     * @param int $port
     */
    public function __construct(string $name, string $url, int $port)
    {
        $this->name = $name;
        $this->url = $url;
        $this->port = $port;
    }

    /**
     * @return string
     */
    protected function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    protected function getPort(): int
    {
        return $this->port;
    }

    /**
     * Make network request to component.
     * Perform CURL request for given parameters - supports all HTTP methods.
     *
     * @param NetworkRequestInterface $networkRequest
     * @return NetworkResponseInterface
     */
    protected function makeRequest(NetworkRequestInterface $networkRequest): NetworkResponseInterface
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->getRequestUrl($networkRequest->getEndpoint()));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $networkRequest->getMethod());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'LM-COMPONENT-HASH: ' . $networkRequest->getComponentHash(),
            'LM-TIME: ' . date('Y-m-d H:i:s'),
            'LM-REQUEST-HASH: ' . uniqid('eng_rng_', true),
            'Content-Type: application/json'
        ]);

        if ('POST' === $networkRequest->getMethod()) {
            curl_setopt($ch, CURLOPT_POST, 1);
        }

        if ($networkRequest->getRequestParams()) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $networkRequest->getRequestParams());
        }

        $response = curl_exec($ch);
        if (!$response) {
            return $this->createResponse(json_encode([
                'message' => curl_error($ch),
                'code' => curl_errno($ch)
            ]));
        }

        curl_close($ch);
        return $this->createResponse($response);
    }

    /**
     * @param string $json
     * @return NetworkResponse
     */
    protected function createResponse(string $json): NetworkResponse
    {
        return new NetworkResponse($json, 200, uniqid('rx_', true));
    }

    /**
     * Prepare full url to component.
     *
     * @param string $endpoint
     * @return string
     */
    private function getRequestUrl(string $endpoint): string
    {
        return sprintf(
            '%s:%d%s',
            $this->url,
            $this->port,
            $endpoint
        );
    }
}