<?php
namespace TennisRefactoringKata\FirstRefactoring;

use TennisRefactoringKata\TennisGame as BaseTennisGame;

class TennisGame implements BaseTennisGame
{
    /** @var  Player */
    private $firstPlayer;
    /** @var  Player */
    private $secondPlayer;
    /** @var Result */
    private $result;

    public function __construct($firstPlayerName, $secondPlayerName)
    {
        $this->firstPlayer = new Player($firstPlayerName);
        $this->secondPlayer = new Player($secondPlayerName);
        $this->result = new Result($this->firstPlayer, $this->secondPlayer);
    }

    public function wonPoint($playerName)
    {
        $isFirstPlayer = $this->firstPlayer->name() == $playerName;
        if ($isFirstPlayer) {
            $this->firstPlayer->wonPoint();
        } else {
            $this->secondPlayer->wonPoint();
        }
    }

    public function getScore()
    {
        return $this->result->toString();
    }
}

