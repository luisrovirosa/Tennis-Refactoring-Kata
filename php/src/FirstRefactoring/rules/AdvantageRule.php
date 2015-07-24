<?php

namespace TennisRefactoringKata\FirstRefactoring\Rules;

class AdvantageRule extends TennisRule
{

    public function isMatch()
    {
        return !$this->hasSameScore() &&
        $this->anyPlayerHaveMoreThanForty() &&
        $this->haveLessThan2PointsOfDifference();
    }

    public function execute()
    {
        return "Advantage " . $this->winningPlayer();
    }

}