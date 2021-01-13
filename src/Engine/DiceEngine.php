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
        $rngHelper = new RNGHelper($game->getGeneratorConfig()->dto());

        var_dump($rngHelper->random());exit();
        $gameRound->setResult(new ResultState($rngValues->getBody()));

        var_dump($rngValues);

        var_dump($gameRound->getStatus());

//        $this->winning($gameRound);
//        $this->flush($gameRound);

        return $gameRound;
    }

}