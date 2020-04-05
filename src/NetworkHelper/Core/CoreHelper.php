<?php

namespace App\NetworkHelper\Core;

use App\Model\Network\NetworkRequest;
use App\Model\Network\NetworkRequestInterface;
use App\Model\Network\NetworkResponseInterface;
use App\Model\Round;
use App\NetworkHelper\AbstractNetworkHelper;

/**
 * Curl helper to core requests.
 * Helper enabling communication with the casino nucleus, it performs all operations
 * on the network after the end of the game.
 * @category   NetworkHelper
 * @package    App\NetworkHelper\Core
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class CoreHelper extends AbstractNetworkHelper
{
    /**
     * RNGHelper constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'loterioma_core_helper',
            'http://loterioma_core',
            80
        );
    }

    /**
     * Method returns
     * @param string $roundJson
     * @return NetworkResponseInterface
     */
    public function processRound(string $roundJson): NetworkResponseInterface
    {
        return $this->makeRequest(new NetworkRequest(
            '/index.php/game/',
            'POST',
            'asdasdsad',
            $roundJson
        ));
    }
}