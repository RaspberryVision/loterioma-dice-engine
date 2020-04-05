<?php

namespace App\Controller;

use App\Engine\DiceEngine;
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
     * @Route("/run", name="web_endpoint_run", methods={"POST"})
     * @param Request $request
     * @param DiceEngine $engine
     * @return JsonResponse
     * @throws \JsonException
     */
    public function run(Request $request, DiceEngine $engine): JsonResponse
    {
        if (!$engine->handleRequest($request->getContent())) {
            return $this->json(['Wrong request parameters']);
        }

        $engine->loadGame();
        $engine->run();

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
