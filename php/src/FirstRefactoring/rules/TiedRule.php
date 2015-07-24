<?php

namespace TennisRefactoringKata\FirstRefactoring\Rules;

class TiedRule extends TennisRule
{
    public function isMatch()
    {
        return $this->hasSameScore();
    }

    public function execute()
    {
        $isDeuce = $this->firstScore()->points() >= self::FORTY_POINTS;
        return $isDeuce ? 'Deuce' : "{$this->firstScore()}-All";
    }

}