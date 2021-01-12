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
        $gameRound = new Round($game, $requestData['parameters']['bets']);
        $rngValues = (new RNGHelper($game->getGeneratorConfig()->dto()))->random();
        $gameRound->setResult(new ResultState($rngValues->getBody()));

//        $this->winning($gameRound);
//        $this->flush($gameRound);

        return $gameRound;
    }

}