<?php
namespace TennisRefactoringKata\SecondRefactoring;

use TennisRefactoringKata\TennisGame as BaseTennisGame;

class TennisGame implements BaseTennisGame
{
    private $firstPlayer;
    private $secondPlayer;

    /** @var Rule[] */
    private $rules;

    public function __construct($player1Name, $player2Name)
    {
        $this->firstPlayer = new Player($player1Name);
        $this->secondPlayer = new Player($player2Name);
        $this->rules = [
            new SameScoreRule($this->firstPlayer, $this->secondPlayer),
            new AdvantageRule($this->firstPlayer, $this->secondPlayer),
            new WinnerRule($this->firstPlayer, $this->secondPlayer)
        ];
    }

    public function getScore()
    {

        foreach ($this->rules as $rule) {
            if ($rule->match()) {
                return $rule->text();
            }
        }

        return $this->normalText();
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
     * @return string
     */
    private function normalText()
    {
        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        $p1res = $scores[min(3, $this->firstPlayer->score())];
        $p2res = $scores[min(3, $this->secondPlayer->score())];

        return "{$p1res}-{$p2res}";
    }
}
