<?php


namespace App\Engine;


use App\Entity\Game;
use App\Entity\ResultState;
use App\Entity\Round;
use App\NetworkHelper\RNG\RNGHelper;

class DiceEngine
{
    public function play(Game $game, $requestData)
    {
        $gameRound = new Round($game, $requestData['userId'], $requestData['parameters']['bets']);
        $rngHelper = new RNGHelper($game->getGeneratorConfig()->dto());

        $gameRound->setResult(new ResultState($rngHelper->random()->getBody()));

//        $this->winning($gameRound);
//        $this->flush($gameRound);

        return $gameRound;
    }

}