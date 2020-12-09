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

namespace App\Controller;

use App\Model\ResultState\DiceResultState;
use App\Model\Round\DiceRound;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The controller being the application access point for HTTP requests.
 * @category   Controller
 * @package    App\Controller
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class EndpointController extends AbstractController
{
    /**
     * @Route("/play", name="web_endpoint_play")
     * @param Request $request
     * @return JsonResponse
     */
    public function play(Request $request): JsonResponse
    {
        $gameObject = $dataStoreHelper->fetchGame($id);

        return $this->process(
            $request->getContent(),
            new DiceEngine($gameObject)
        );



        $requestParameters = $this->handleRequest($requestContent);

        if (!$requestParameters instanceof GameRequestInterface) {
            return $this->json(
                [
                    'body' => 'Invalid request params.',
                    'debug' => [
                        'requestContent' => $requestContent
                    ]
                ]
            );
        }

        switch ($requestParameters->getMode()) {
            case 1:
            case 2:
                $gameRound = $engine->simulate(5);
                break;
            default:
                $gameRound = $engine->play($requestParameters);
        }

        if (!$gameRound instanceof RoundInterface) {
            throw new \LogicException('We got problem with determine game mode.');
        }

        $engine->flush($gameRound);

        return $this->json(
            [
                'body' => $gameRound->printInfo(),
            ]
        );

        $gameRound = new DiceRound(
            $this->game,
            new DiceResultState($this->RNGHelper->random()),
            $gameRequest->getParameters()['bets']
        );

        $this->winning($gameRound);
        $this->flush($gameRound);

        return $gameRound;

        return $this->json(
            [
                'status' => 1,
            ],
            200,
            [
                'LM-COMPONENT-HASH' => md5('dice-engine')
            ]
        );
    }


    /**
     * Process the flow of the delivered game.
     * @param string $requestContent
     * @param AbstractGameEngine $engine
     * @return JsonResponse
     */
    protected function process(string $requestContent, AbstractGameEngine $engine): JsonResponse
    {
        $requestParameters = $this->handleRequest($requestContent);

        if (!$requestParameters instanceof GameRequestInterface) {
            return $this->json(
                [
                    'body' => 'Invalid request params.',
                    'debug' => [
                        'requestContent' => $requestContent
                    ]
                ]
            );
        }

        switch ($requestParameters->getMode()) {
            case 1:
            case 2:
                $gameRound = $engine->simulate(5);
                break;
            default:
                $gameRound = $engine->play($requestParameters);
        }

        if (!$gameRound instanceof RoundInterface) {
            throw new \LogicException('We got problem with determine game mode.');
        }

        $engine->flush($gameRound);

        return $this->json(
            [
                'body' => $gameRound->printInfo(),
            ]
        );
    }


//    /**
//     * Fetch request parameters, an incorrect format error is also handled.
//     * @param string $jsonData
//     * @return GameRequestInterface|false
//     */
//    protected function handleRequest(string $jsonData)
//    {
//        try {
//            return $this->createGameRequest($jsonData);
//        } catch (\Exception $exception) {
//            return false;
//        }
//    }
//
//    /**
//     * @Route("/play/{id}", name="dice_play")
//     * @param int $id
//     * @param Request $request
//     * @param DataStoreHelper $dataStoreHelper
//     * @return JsonResponse
//     */
//    public function play(int $id, Request $request, DataStoreHelper $dataStoreHelper): JsonResponse
//    {
//        $gameObject = $dataStoreHelper->fetchGame($id);
//
//        return $this->process(
//            $request->getContent(),
//            new DiceEngine($gameObject)
//        );
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function createGameRequest($jsonData): DicePlayRequest
//    {
//        return new DicePlayRequest($jsonData);
//    }
}
