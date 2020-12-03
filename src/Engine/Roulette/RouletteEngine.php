<?php
//
///**
// * RouletteEngine - @todo One sentence about that.
// *
// * @todo add file description
// *
// * See more: @todo add documentation link
// *
// * Engine - casino game server.
// * @see https://github.com/RaspberryVision/loterioma-engine
// *
// * This code is part of the LoterioMa casino system.
// * @see https://github.com/RaspberryVision/loterioma
// *
// * Created by Rafal Malik.
// * 22:47 21.03.2020, Warsaw/Zabki - DELL
// */
//
//namespace App\Engine\Roulette;
//
//use App\Engine\GameEngine\AbstractGameEngine;
//use App\Engine\Helpers\RouletteWinningHelper;
//use App\Model\Game\DiceGame;
//use App\Model\Game\RouletteGame;
//use App\Model\ResultState\RouletteResultState;
//use App\Model\Round\AbstractRound;
//use App\Model\Round\DiceRound;
//use App\Model\Round\RouletteRound;
//use App\Model\Round\RoundInterface;
//
///**
// * Implementation of the roulette game engine using a random number generator.
// * @category   Engines
// * @package    App\Engine\Roulette
// * @author     Rafal Malik <rafalmalik.info@gmail.com>
// * @copyright  03.2020 Raspberry Vision
// */
//class RouletteEngine extends AbstractGameEngine
//{
//    /**
//     * DiceEngine constructor.
//     * @param RouletteGame $game
//     */
//    public function __construct(RouletteGame $game)
//    {
//        parent::__construct($game, new RouletteWinningHelper());
//    }
//
//    /**
//     * @param int $bet
//     * @param array $params
//     * @return RouletteRound
//     */
//    public function play(int $bet, array $params = []): RouletteRound
//    {
//        $gameRound = new RouletteRound(
//            $this->game,
//            $bet,
//            new RouletteResultState($this->RNGHelper->random($this->requestOptions)),
//            $params['bets']
//        );
//
//        $this->winning($gameRound);
//        $this->flush($gameRound);
//
//        return $gameRound;
//    }
//
//    /**
//     * @param RoundInterface $gameRound
//     * @return DiceRound
//     */
//    public function winning(RoundInterface $gameRound): AbstractRound
//    {
//        return $this->winningHelper->checkWinnings($gameRound);
//    }
//
//    /**
//     * @param RoundInterface $gameRound
//     * @return mixed
//     */
//    public function flush(RoundInterface $gameRound)
//    {
//        // TODO: Implement flush() method.
//    }
//
//    /**
//     * @param RoundInterface $gameRound
//     * @return bool
//     * @todo Short description
//     */
//    public function simulate(RoundInterface $gameRound): bool
//    {
//        // TODO: Implement simulate() method.
//    }
//
//    public function random(): array
//    {
//        // TODO: Implement random() method.
//    }
//}