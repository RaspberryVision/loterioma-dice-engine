<?php

namespace App\NetworkHelper\RNG;

use App\Model\GeneratorConfig;
use App\Model\Network\NetworkRequest;
use App\Model\Network\NetworkResponseInterface;
use App\NetworkHelper\AbstractNetworkHelper;

/**
 * Helper providing communication with a random number generator.
 * An auxiliary class providing methods for performing API queries to the loterioma-rng component.
 * @category   NetworkHelper
 * @package    App\NetworkHelper\RNG
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class RNGHelper extends AbstractNetworkHelper
{
    /**
     * RNGHelper constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'loterioma_rng_helper',
            'http://loterioma_rng',
            80
        );
    }

    /**
     * Method returns
     * @param GeneratorConfig $generatorConfig
     * @return NetworkResponseInterface
     */
    public function throwDice(GeneratorConfig $generatorConfig): NetworkResponseInterface
    {
        $networkRequest = new NetworkRequest(
            '/index.php/generate',
            'POST',
            'asdasd',
            $generatorConfig
        );

        return $this->makeRequest($networkRequest);
    }
}