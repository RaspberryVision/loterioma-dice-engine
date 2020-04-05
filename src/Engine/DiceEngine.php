<?php

namespace App\Engine;

use App\Engine\Utils\BetChecker;
use App\Model\Bet;
use App\Model\Game;
use App\Model\GameRequest;
use App\Model\Network\NetworkResponseInterface;
use App\Model\Round;
use App\Model\RoundResult;
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
    private object $game;

    /**
     * @var GameRequest|object $request
     */
    private object $request;

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
     * @var SerializerInterface $serializer
     */
    private SerializerInterface $serializer;

    /**
     * Current round object.
     * @var Round|null $currentRound
     */
    private ?Round $currentRound;

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
    }

    /**
     * @param string $requestContent
     * @return bool
     */
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
     * @throws \JsonException
     */
    public function run(): bool
    {
        $this->currentRound = new Round(
            $this->game,
            $this->request->getParameters(),
            new RoundResult($this->drawMatrix()),
        );

        /** Load bets to round object */
        $this->loadBets();

        /** Checking winning bets */
        $this->checkBets();

        /** Save round object in DataStore component */
        $this->dispatchRound();

        return true;
    }

    /**
     * A method that returns the result of a round.
     */
    public function getResult(): ?RoundResult
    {
        return $this->currentRound->getResult();
    }

    /**
     * Load the game configuration into the engine.
     * Return true on success, otherwise return false.
     * @return bool
     */
    public function loadGame(): bool
    {
        $this->game = $this->serializer->deserialize(
            $this->dataStoreHelper->fetchGame($this->request->getGameId())->getBody(),
            Game::class,
            'json'
        );

        if (!$this->game->getGeneratorConfig()) {
            return false;
        }

        return true;
    }

    /**
     * @return array|string|null
     * @throws \JsonException
     */
    private function drawMatrix()
    {
        return json_decode($this->RNGHelper->throwDice(
            $this->serializer->serialize($this->game->getGeneratorConfig(), 'json')
        )->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return NetworkResponseInterface
     */
    private function dispatchRound(): NetworkResponseInterface
    {
        return $this->coreHelper->processRound($this->serializer->serialize($this->currentRound, 'json'));
    }

    /**
     * Load bets from array to Round as Bet object.
     */
    private function loadBets(): void
    {
        if (!$this->currentRound || !isset($this->request->getParameters()['bets'])) {
            return;
        }

        foreach ($this->request->getParameters()['bets'] as $item) {
            $this->currentRound->addBet(new Bet(
                $item['stake'],
                $item['number'],
                $this->request->getUserId()
            ));
        }
    }

    /**
     * The firing method of coupon verification for victory.
     */
    private function checkBets(): void
    {
        (new BetChecker())->process($this->currentRound);
    }
}