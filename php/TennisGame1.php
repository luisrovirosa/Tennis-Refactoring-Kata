<?php

class TennisGame1 implements TennisGame
{
    /** @var  Player */
    private $player1;
    /** @var  Player */
    private $player2;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1 = new Player($player1Name);
        $this->player2 = new Player($player2Name);
    }

    public function wonPoint($playerName)
    {
        if ('player1' == $playerName) {
            $this->player1->wonPoint();
        } else {
            $this->player2->wonPoint();
        }
    }

    public function getScore()
    {
        $score = "";
        if ($this->player1->scores() == $this->player2->scores()) {
            switch ($this->player1->scores()) {
                case 0:
                    $score = "Love-All";
                    break;
                case 1:
                    $score = "Fifteen-All";
                    break;
                case 2:
                    $score = "Thirty-All";
                    break;
                default:
                    $score = "Deuce";
                    break;
            }
        } elseif ($this->player1->scores() >= 4 || $this->player2->scores() >= 4) {
            $minusResult = $this->player1->scores() - $this->player2->scores();
            if ($minusResult == 1) {
                $score = "Advantage player1";
            } elseif ($minusResult == -1) {
                $score = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $score = "Win for player1";
            } else {
                $score = "Win for player2";
            }
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $tempScore = $this->player1->scores();
                } else {
                    $score .= "-";
                    $tempScore = $this->player2->scores();
                }
                switch ($tempScore) {
                    case 0:
                        $score .= "Love";
                        break;
                    case 1:
                        $score .= "Fifteen";
                        break;
                    case 2:
                        $score .= "Thirty";
                        break;
                    case 3:
                        $score .= "Forty";
                        break;
                }
            }
        }
        return $score;
    }
}

