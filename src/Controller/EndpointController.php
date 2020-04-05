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

use App\Engine\DiceEngine;
use App\Model\GameRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

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
     * @Route("/run", name="web_endpoint_run", methods={"POST"})
     * @param Request $request
     * @param DiceEngine $engine
     * @return JsonResponse
     */
    public function run(Request $request, DiceEngine $engine): JsonResponse
    {

        if ($engine->handleRequest($request->getContent())) {

            $engine->loadGame();

            $engine->run();

            return $this->json($engine->getResult());
        }

        return $this->json(['elo']);


        /** Dice engine instance with GameRequest object as parameter */
//        $engine = new DiceEngine(
//            $serializer,
//            $gameRequest
//        );

        //var_dump($engine);

        /** Call main function of engine - his contains all logic of game */
       // $engine->run();

        return $this->json(
            $engine->getResult(),
            200,
            [
                'LM-COMPONENT-HASH' => md5('dice-engine')
            ]
        );
    }

    /**
     * @Route("/status", name="web_endpoint_status", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function status(Request $request): JsonResponse
    {
        return $this->json(
            [
                'status' => 0,
                'services' => [
                    'rng' => [
                        'status' => 0
                    ],
                    'core' => [
                        'status' => 0
                    ],
                    'data-store' => [
                        'status' => 0
                    ],
                ]
            ],
            200,
            [
                'LM-COMPONENT-HASH' => md5('dice-engine'),
                'Content-Type' => 'application/json'
            ]
        );
    }
}
