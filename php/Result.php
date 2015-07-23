<?php

class Result
{
    /** @var Player */
    private $player1;

    /** @var Player */
    private $player2;

    /**
     * Score constructor.
     * @param $player1
     * @param $player2
     */
    public function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function toString()
    {
        $score = "";
        $hasSameScore = $this->player1->points() == $this->player2->points();
        if ($hasSameScore) {
            switch ($this->player1->points()) {
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
        } elseif ($this->player1->points() >= 4 || $this->player2->points() >= 4) {
            $minusResult = $this->player1->points() - $this->player2->points();
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
                    $tempScore = $this->player1->score();
                } else {
                    $score .= "-";
                    $tempScore = $this->player2->score();
                }
                $score .= $tempScore;
            }
        }
        return $score;
    }
}