<?php

namespace TennisRefactoringKata\SecondRefactoring;

class Player
{
    /** @var  int */
    private $score;
    private $playerName;

    /**
     * Player constructor.
     * @param $playerName
     */
    public function __construct($playerName)
    {
        $this->playerName = $playerName;
        $this->score = 0;
    }

    public function winPoint()
    {
        $this->score++;
    }

    /**
     * @return int
     */
    public function score()
    {
        return $this->score;
    }

    public function name()
    {
        return $this->playerName;
    }
}