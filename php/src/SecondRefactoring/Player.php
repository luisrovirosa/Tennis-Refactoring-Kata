<?php

namespace TennisRefactoringKata\SecondRefactoring;

class Player
{
    /** @var  int */
    private $score;

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
}