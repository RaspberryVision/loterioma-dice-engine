<?php
///**
// * Implementation of GameEngine.
// *
// * Currently, it is a game engine that will eventually become an abstract engine and separate:
// * - SlotsGameEngine
// * - CardGameEngine
// * - LotteryGameEngine
// *
// * @category   Engines
// * @package    App\Engine
// * @author     Rafal Malik <kontakt@raspberryvision.pl>
// * @copyright  03.2020 Raspberry Vision
// */
//
//namespace App\Engine\Slots;
//
//use App\Engine\GameEngine\AbstractGameEngine;
//use App\Engine\Helpers\SlotsWinningHelper;
//use App\Engine\Helpers\WinningHelperInterface;
//use App\Model\Game\SlotsGame;
//use App\Model\Combination\CombinationInterface;
//use App\Model\PaylineItem\PaylineItemInterface;
//use App\Model\ResultState\ResultStateInterface;
//use App\Model\ResultState\SlotsResults;
//use App\Model\GameResultMatrix\GameResultMatrixInterface;
//use App\Model\ResultState\SlotsResultState;
//use App\Model\Round\AbstractRound;
//use App\Model\Round\RoundInterface;
//use App\Model\Round\SlotsRound;
//
///**
// * Implementation of the engine used as a casino slot machine engine.
// * @category   Engines
// * @package    App\Engine\Slots
// * @author     Rafal Malik <rafalmalik.info@gmail.com>
// * @copyright  03.2020 Raspberry Vision
// */
//class SlotsEngine extends AbstractGameEngine
//{
//    /**
//     * GameEngine constructor.
//     * @param SlotsGame $game
//     */
//    public function __construct(SlotsGame $game)
//    {
//        parent::__construct($game, new SlotsWinningHelper());
//    }
//
//    /**
//     * @param int $bet
//     * @param array $params
//     * @return SlotsRound
//     */
//    public function play(int $bet, array $params = []): SlotsRound
//    {
//        $gameResult = new SlotsResultState($this->RNGHelper->random($this->requestOptions));
//
//        $gameRound = new SlotsRound(
//            $this->game,
//            $bet,
//            $gameResult,
//            [
//                [0, 0],
//                [0, 1],
//                [0, 2],
//            ]
//        );
//
//        $this->winning($gameRound);
//
//        $this->flush($gameRound);
//
//        return $gameRound;
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
//    public function simulate(RoundInterface $gameRound): bool
//    {
//        // TODO: Implement simulate() method.
//    }
//
//    public function random(): array
//    {
//        // TODO: Implement random() method.
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function winning(AbstractRound $round): AbstractRound
//    {
//        return $this->winningHelper->checkWinnings($round);
//    }
//}