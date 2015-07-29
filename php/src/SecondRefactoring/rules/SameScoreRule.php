<?php

namespace TennisRefactoringKata\SecondRefactoring\Rules;

class SameScoreRule extends BaseRule
{

    public function match()
    {
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }

    public function text()
    {
        $scores = ['Love-All', 'Fifteen-All', 'Thirty-All', 'Deuce'];
        $points = min(3, $this->firstPlayer->score());
        return $scores[$points];
    }
}