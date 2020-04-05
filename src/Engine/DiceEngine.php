<?php
/**
 * LoteriomaDiceEngine - application enabling the operation of gambling cubes.
 *
 * The application consists of a dice game engine based on a pseudo-randomity for which
 * the external RNG component is used. The application is only responsible for handling
 * the game logic and forwards its results to the Core component. Data used in the operation
 * of the application are downloaded from the DataStore component.
 *
 * See more: https://raspberryvision.github.io/loterioma-dice-engine/.
 *
 * DiceEngine - casino dice game server.
 * @see https://github.com/RaspberryVision/loterioma-dice-engine
 *
 * This code is part of the LoterioMa casino system.
 * @see https://github.com/RaspberryVision/loterioma
 *
 * Created by Rafal Malik.
 * 15:47 02.04.2020, Warsaw/Zabki - DELL
 */

namespace App\Engine;

use App\Engine\Utils\BetChecker;
use App\Model\Game;
use App\Model\GameRequest;
use App\NetworkHelper\Core\CoreHelper;
use App\NetworkHelper\DataStore\DataStoreHelper;
use App\NetworkHelper\RNG\RNGHelper;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Implementation of the cube game engine using a random number generator.
 * @category   Engine
 * @package    App\Engine
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  03.2020 Raspberry Vision
 */
class DiceEngine
{
    /**
     * @var Game|object $game
     */
    private Object $game;

    /**
     * @var GameRequest|object $request
     */
    private Object $request;

    /**
     * @var RNGHelper $RNGHelper
     */
    private RNGHelper $RNGHelper;

    /**
     * @var CoreHelper $coreHelper
     */
    private CoreHelper $coreHelper;

    /**
     * @var DataStoreHelper $dataStoreHelper
     */
    private DataStoreHelper $dataStoreHelper;

    /**
     * @var BetChecker $betChecker
     */
    private BetChecker $betChecker;

    /**
     * @var SerializerInterface $serializer
     */
    private SerializerInterface $serializer;

    /**
     * DiceEngine constructor.
     * @param SerializerInterface $serializer
     * @param RNGHelper $RNGhelper
     */
    public function __construct(
        SerializerInterface $serializer,
        RNGHelper $RNGhelper,
        CoreHelper $coreHelper,
        DataStoreHelper $dataStoreHelper
    )
    {
        $this->serializer = $serializer;
        $this->RNGHelper = $RNGhelper;
        $this->coreHelper = $coreHelper;
        $this->dataStoreHelper = $dataStoreHelper;
        $this->betChecker = new BetChecker();
    }

    public function handleRequest(string $requestContent): bool
    {
        try {
            $this->request = $this->serializer->deserialize($requestContent, GameRequest::class, 'json');
            return true;
        } catch (BadRequestHttpException $exception) {
            return false;
        }
    }

    /**
     * The function that supports the game logic is called when the game is drawn (the game takes place).
     */
    public function run(): bool
    {
        return true;
    }

    /**
     * A method that returns the result of a round.
     */
    public function getResult()
    {
        return 'resukt';
    }

    /**
     * Load the game configuration into the engine.
     * Return true on success, otherwise return false.
     * @return bool
     */
    public function loadGame(): bool
    {
        $this->game =  $this->serializer->deserialize(
            $this->dataStoreHelper->fetchGame($this->request->getGameId())->getBody(),
            Game::class,
            'json'
        );

        if (!$this->game->getGeneratorConfig()) {
            return false;
        }

        return true;
    }
}