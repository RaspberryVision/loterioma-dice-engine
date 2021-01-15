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
use App\Model\ResultState\DiceResultState;
use App\Model\Round\DiceRound;
use App\Repository\GameRepository;
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
 * @Route("/base")
 */
class BasicController extends AbstractController
{
    /**
     * @Route("/play", name="base_endpoint_play")
     * @param Request $request
     * @param GameRepository $gameRepository
     * @param DiceEngine $engine
     * @return JsonResponse
     */
    public function play(Request $request, GameRepository $gameRepository, DiceEngine $engine): JsonResponse
    {
        $gameObject = $gameRepository->find($request->get('id', -1));

        if (!$gameObject) {
            // @todo response error
        }

        $gameRound = $engine->play($gameObject, json_decode($request->getContent(), true));

        return $this->json(
            [
                'body' => $gameRound->printInfo(),
            ]
        );
    }


}
