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
        $sameScore = $this->firstPlayer->score() == $this->secondPlayer->score();
        if ($sameScore) {
            $scores = ['Love-All', 'Fifteen-All', 'Thirty-All', 'Deuce'];
            $points = min(3, $this->firstPlayer->score());
            return $scores[$points];
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

        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        $p1res = $scores[min(3, $this->firstPlayer->score())];
        $p2res = $scores[min(3, $this->secondPlayer->score())];

        return "{$p1res}-{$p2res}";
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
