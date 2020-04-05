<?php

namespace App\NetworkHelper\DataStore;

use App\Model\Network\NetworkRequest;
use App\Model\Network\NetworkResponseInterface;
use App\NetworkHelper\AbstractNetworkHelper;

/**
 * Curl helper to data store requests.
 *
 * Helper providing access to the DataStore component that serves as a data warehouse.
 * @category   NetworkHelper
 * @package    App\NetworkHelper\DataStore
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class DataStoreHelper extends AbstractNetworkHelper
{
    /**
     * DataStoreHelper constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'loterioma_datastore_helper',
            'http://api',
            80, 1
        );
    }

    /**
     * The method used to retrieve the user's object based on the criteria provided.
     * @param int $id
     * @return NetworkResponseInterface
     */
    public function fetchUser(int $id): NetworkResponseInterface
    {
        return $this->makeRequest(new NetworkRequest(
            '/members/' . $id,
            'GET',
            'sadasdas',
            []
        ));
    }

    /**
     * The method that sends a request to save the object of the created game.
     * !!! To play, you must still activate the game object.
     * @param int $id
     * @return NetworkResponseInterface
     */
    public function fetchGame(int $id): NetworkResponseInterface
    {
        return $this->makeRequest(new NetworkRequest(
            '/games/' . $id,
            'GET',
            'sadasdas',
            []
        ));
    }
}