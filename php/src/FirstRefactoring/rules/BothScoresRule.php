<?php

namespace TennisRefactoringKata\FirstRefactoring\Rules;

class BothScoresRule extends TennisRule
{

    public function isMatch()
    {
        return !$this->anyPlayerHaveMoreThanForty() && !$this->hasSameScore();
    }

    public function execute()
    {
        return "{$this->firstScore()}-{$this->secondScore()}";
    }
}