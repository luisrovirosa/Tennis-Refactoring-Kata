<?php
namespace TennisRefactoringKata\SecondRefactoring;

use TennisRefactoringKata\TennisGame as BaseTennisGame;

class TennisGame implements BaseTennisGame
{
    private $firstPlayer;
    private $secondPlayer;

    public function __construct($player1Name, $player2Name)
    {
        $this->firstPlayer = new Player($player1Name);
        $this->secondPlayer = new Player($player2Name);
    }

    public function getScore()
    {
        $p2res = $score = '';
        $sameScore = $this->firstPlayer->score() == $this->secondPlayer->score();
        if ($sameScore) {
            $scores = ['Love-All', 'Fifteen-All', 'Thirty-All', 'Deuce'];
            $points = min(3, $this->firstPlayer->score());
            return $scores[$points];
        }

        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        $p1res = $scores[min(3, $this->firstPlayer->score())];

        if ($this->firstPlayer->score() > 0) {
            $p2res = "Love";
            $score = "{$p1res}-{$p2res}";
        }

        if ($this->secondPlayer->score() > 0 && $this->firstPlayer->score() == 0) {
            if ($this->secondPlayer->score() == 1) {
                $p2res = "Fifteen";
            }
            if ($this->secondPlayer->score() == 2) {
                $p2res = "Thirty";
            }
            if ($this->secondPlayer->score() == 3) {
                $p2res = "Forty";
            }
            $score = "{$p1res}-{$p2res}";
        }

        if ($this->firstPlayer->score() > $this->secondPlayer->score() && $this->firstPlayer->score(
            ) < 4
        ) {
            if ($this->secondPlayer->score() == 1) {
                $p2res = "Fifteen";
            }
            if ($this->secondPlayer->score() == 2) {
                $p2res = "Thirty";
            }
            $score = "{$p1res}-{$p2res}";
        }

        if ($this->secondPlayer->score() > $this->firstPlayer->score(
            ) && $this->secondPlayer->score() < 4
        ) {
            if ($this->secondPlayer->score() == 2) {
                $p2res = "Thirty";
            }
            if ($this->secondPlayer->score() == 3) {
                $p2res = "Forty";
            }
            $score = "{$p1res}-{$p2res}";
        }

        $winning = $this->firstPlayer->score() > $this->secondPlayer->score(
        ) ? 'player1' : 'player2';
        $pointsDifference = $this->firstPlayer->score() - $this->secondPlayer->score();

        $isAdvantage = $this->bothHaveWinMoreThan(4) && abs($pointsDifference) < 2;
        if ($isAdvantage) {
            return "Advantage $winning";
        }

        $gameIsOver = $this->bothHaveWinMoreThan(4) && abs($pointsDifference) >= 2;
        if ($gameIsOver) {
            return "Win for $winning";
        }

        return $score;
    }

    private function P1Score()
    {
        $this->firstPlayer->winPoint();
    }

    private function P2Score()
    {
        $this->secondPlayer->winPoint();
    }

    public function wonPoint($player)
    {
        if ($player == "player1") {
            $this->P1Score();
        } else {
            $this->P2Score();
        }
    }

    /**
     * @param $points
     * @return bool
     */
    private function bothHaveWinMoreThan($points)
    {
        return ($this->firstPlayer->score() >= $points || $this->secondPlayer->score() >= $points);
    }
}
