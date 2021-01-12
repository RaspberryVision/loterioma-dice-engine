<?php
/**
 * Curl helper to RandomNumberGenerator.
 *
 * An auxiliary class providing methods for performing API queries to the loterioma-rng component.
 *
 * @category   Helpers
 * @package    App\NetworkHelper\RNG
 * @author     Rafal Malik <kontakt@raspberryvision.pl>
 * @copyright  03.2020 Raspberry Vision
 */

namespace App\NetworkHelper\RNG;

use App\Entity\GeneratorConfig;
use App\Model\DTO\Network\NetworkRequest;
use App\Model\DTO\Network\NetworkRequestInterface;
use App\Model\DTO\Network\NetworkResponseInterface;
use App\NetworkHelper\AbstractNetworkHelper;

/**
 * Helper providing communication with a random number generator.
 * @category   NetworkHelper
 * @package    App\NetworkHelper\RNG
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class RNGHelper extends AbstractNetworkHelper
{
    /** @var GeneratorConfig $generatorConfig */
    private $generatorConfig;

    /**
     * RNGHelper constructor.
     * @param GeneratorConfig $generatorConfig
     */
    public function __construct(GeneratorConfig $generatorConfig)
    {
        parent::__construct(
            'loterioma_rng_helper',
            'http://loterioma_rng',
            80
        );
        $this->generatorConfig = $generatorConfig;
    }

    /**
     * Method returns
     * @return NetworkResponseInterface
     */
    public function random(): NetworkResponseInterface
    {
        $networkRequest = new NetworkRequest(
            '/index.php/generate',
            'POST',
            'asdasd',
            $this->generatorConfig
        );

        return $this->makeRequest($networkRequest);
    }
}