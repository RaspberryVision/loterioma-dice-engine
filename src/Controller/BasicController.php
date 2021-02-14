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
use App\Entity\Bet;
use App\Entity\GameSession;
use App\Entity\ResultState;
use App\Entity\Round;
use App\Model\ResultState\DiceResultState;
use App\Model\Round\DiceRound;
use App\NetworkHelper\Cashier\CashierHelper;
use App\Repository\GameRepository;
use App\Repository\GameSessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
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
    public function play(
        Request $request,
        GameSessionRepository $sessionRepository,
        GameRepository $gameRepository,
        DiceEngine $engine,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $gameObject = $gameRepository->find($request->get('id', -1));

        if (!$gameObject) {
            // @todo response error
        }

        $data = json_decode($request->getContent(), true);

        $gameRound = $engine->play($gameObject, $data);

        $session = $sessionRepository->findOneBy(['token' => $data['sessionId']]);

        $gameRound->setSession($session);
        $this->checkWinnings($gameRound);

        $entityManager->persist($gameRound);
        $entityManager->flush();

        return $this->json(
            [
                'body' => $gameRound->printInfo(),
            ]
        );
    }

    /**
     * @Route("/session", name="base_endpoint_session")
     */
    public function createSession(
        Request $request,
        GameRepository $gameRepository,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ) {
        $data = json_decode($request->getContent(), true);
        // Check that cashier is ok
        $cashier = new CashierHelper();
        $response = $cashier->payIn([
            'amount' => $data['amount'],
            'userId' => $data['userId'],
            'gameId' => $data['gameId']
        ])->getBody();

        if ($response['status'] !== 0) {
            return $this->json(
                [
                    'status' => $response['status']
                ]
            );
        }

        $gameObject = $gameRepository->find($request->get('id', -1));

        $session = new GameSession();
        $session->setValue($data['amount'])
            ->setToken(uniqid())
            ->setGame($gameObject)
            ->setCreatedAt(new \DateTime());

        $entityManager->persist($session);
        $entityManager->flush();

        return $this->json(
            [
                'sessionId' => $session->getToken(),
                'amount' => $session->getValue(),
            ]
        );
    }

    /**
     * The process of analyzing opportunities for winners.
     * @param AbstractRound $round
     * @return AbstractRound
     */
    public function checkWinnings(Round $round)
    {
        // Default round is lost.
        $round->setStatus(1);

        /** @var Bet $bet */
        foreach ($round->getBets() as $bet) {
            $round->getSession()->setValue(
                $round->getSession()->getValue() - $bet->getRate()
            );
            if ($this->checkBet($round->getResult(), $bet)) {
                $round->getResult()->addWonBet($bet);
                $round->setStatus(2);
                $round->getSession()->setValue(
                    $round->getSession()->getValue() + $this->calculateWin()
                );
            }
        }

        return $round;
    }

    /**
     * @param ResultState $matrix
     * @param Bet $bet
     * @return bool
     */
    private function checkBet(ResultState $resultState, Bet $bet): bool
    {
        return $bet->getNumber() === $resultState->getValue(0, 0);
    }

    private function calculateWin()
    {
        return 20;
    }

}
