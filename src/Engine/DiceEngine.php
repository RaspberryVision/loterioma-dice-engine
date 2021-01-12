<?php


namespace App\Engine;


use App\Entity\Game;
use App\Model\ResultState\DiceResultState;
use App\Model\Round\DiceRound;
use App\NetworkHelper\RNG\RNGHelper;

class DiceEngine
{



    public function play(Game $game, $requestData)
    {
        $gameRound = new DiceRound(
            $game,
            new DiceResultState((new RNGHelper($game->getGeneratorConfig()->dto()))->random()),
            $requestData['bets']
        );

        $this->winning($gameRound);
        $this->flush($gameRound);

        return $gameRound;
    }

}