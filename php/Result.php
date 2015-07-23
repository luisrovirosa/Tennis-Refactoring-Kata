<?php

class Result
{
    /** @var Player */
    private $firstPlayer;

    /** @var Player */
    private $secondPlayer;

    /**
     * Score constructor.
     * @param $firstPlayer
     * @param $secondPlayer
     */
    public function __construct($firstPlayer, $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public function toString()
    {
        $hasSameScore = $this->firstPlayer->score()->points() == $this->secondPlayer->score(
            )->points();
        if ($hasSameScore) {
            $isDeuce = $this->firstPlayer->score()->points() >= 3;
            $player1Score = $isDeuce ?
                'Deuce' :
                $this->firstPlayer->score()->toString() . '-All';
        } elseif ($this->firstPlayer->score()->points() >= 4 || $this->secondPlayer->score(
            )->points() >= 4
        ) {
            $minusResult = $this->firstPlayer->score()->points() - $this->secondPlayer->score(
                )->points();
            if ($minusResult == 1) {
                $player1Score = "Advantage player1";
            } elseif ($minusResult == -1) {
                $player1Score = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $player1Score = "Win for player1";
            } else {
                $player1Score = "Win for player2";
            }
        } else {
            $player1Score = $this->firstPlayer->score()->toString() .
                '-' .
                $this->secondPlayer->score()->toString();
        }
        return $player1Score;
    }
}