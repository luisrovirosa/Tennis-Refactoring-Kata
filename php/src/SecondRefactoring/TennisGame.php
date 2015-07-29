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
        $p1res = $p2res = $score = '';
        $sameScore = $this->firstPlayer->score() == $this->secondPlayer->score();
        if ($sameScore) {
            $scores = ['Love-All', 'Fifteen-All', 'Thirty-All', 'Deuce'];
            $points = min(3, $this->firstPlayer->score());
            return $scores[$points];
        }

        if ($this->firstPlayer->score() > 0) {
            if ($this->firstPlayer->score() == 1) {
                $p1res = "Fifteen";
            }
            if ($this->firstPlayer->score() == 2) {
                $p1res = "Thirty";
            }
            if ($this->firstPlayer->score() == 3) {
                $p1res = "Forty";
            }

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
            $p1res = "Love";
            $score = "{$p1res}-{$p2res}";
        }

        if ($this->firstPlayer->score() > $this->secondPlayer->score() && $this->firstPlayer->score(
            ) < 4
        ) {
            if ($this->firstPlayer->score() == 2) {
                $p1res = "Thirty";
            }
            if ($this->firstPlayer->score() == 3) {
                $p1res = "Forty";
            }
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
            if ($this->firstPlayer->score() == 1) {
                $p1res = "Fifteen";
            }
            if ($this->firstPlayer->score() == 2) {
                $p1res = "Thirty";
            }
            $score = "{$p1res}-{$p2res}";
        }

        $winner = $this->firstPlayer->score() > $this->secondPlayer->score(
        ) ? 'player1' : 'player2';
        if ($this->bothHaveWinMoreThan(4)) {
            $score = "Advantage $winner";
        }

        $pointsDifference = $this->firstPlayer->score() - $this->secondPlayer->score();

        $gameIsOver = $this->bothHaveWinMoreThan(4) && abs($pointsDifference) >= 2;
        if ($gameIsOver) {
            return "Win for $winner";
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
