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
        if ($this->firstPlayer->score() == $this->secondPlayer->score(
            ) && $this->firstPlayer->score() < 4
        ) {
            if ($this->firstPlayer->score() == 0) {
                $score = "Love";
            }
            if ($this->firstPlayer->score() == 1) {
                $score = "Fifteen";
            }
            if ($this->firstPlayer->score() == 2) {
                $score = "Thirty";
            }
            $score .= "-All";
        }

        if ($this->firstPlayer->score() == $this->secondPlayer->score(
            ) && $this->firstPlayer->score() >= 3
        ) {
            $score = "Deuce";
        }

        if ($this->firstPlayer->score() > 0 && $this->secondPlayer->score() == 0) {
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

        if ($this->firstPlayer->score() > $this->secondPlayer->score(
            ) && $this->secondPlayer->score() >= 3
        ) {
            $score = "Advantage player1";
        }

        if ($this->secondPlayer->score() > $this->firstPlayer->score() && $this->firstPlayer->score(
            ) >= 3
        ) {
            $score = "Advantage player2";
        }

        if ($this->firstPlayer->score() >= 4 && $this->secondPlayer->score(
            ) >= 0 && ($this->firstPlayer->score() - $this->secondPlayer->score()) >= 2
        ) {
            $score = "Win for player1";
        }

        if ($this->secondPlayer->score() >= 4 && $this->firstPlayer->score(
            ) >= 0 && ($this->secondPlayer->score() - $this->firstPlayer->score()) >= 2
        ) {
            $score = "Win for player2";
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
}
