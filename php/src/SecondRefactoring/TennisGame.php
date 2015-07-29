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
            new WinnerRule($this->firstPlayer, $this->secondPlayer),
            new NormalRule($this->firstPlayer, $this->secondPlayer)
        ];
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getScore()
    {
        foreach ($this->rules as $rule) {
            if ($rule->match()) {
                return $rule->text();
            }
        }
        throw new \Exception('Rule not defined');
    }

    public function wonPoint($playerName)
    {
        if ($playerName == $this->firstPlayer->name()) {
            $this->firstPlayer->winPoint();
        } else {
            $this->secondPlayer->winPoint();
        }
    }

}