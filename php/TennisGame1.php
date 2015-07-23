<?php

class TennisGame1 implements TennisGame
{
    /** @var  Player */
    private $player1;
    /** @var  Player */
    private $player2;
    /** @var Result */
    private $score;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1 = new Player($player1Name);
        $this->player2 = new Player($player2Name);
        $this->score = new Result($this->player1, $this->player2);
    }

    public function wonPoint($playerName)
    {
        $isPlayer1 = $this->player1->name() == $playerName;
        if ($isPlayer1) {
            $this->player1->wonPoint();
        } else {
            $this->player2->wonPoint();
        }
    }

    public function getScore()
    {
        return $this->score->toString();
    }
}

