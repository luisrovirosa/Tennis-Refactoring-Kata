<?php

namespace TennisRefactoringKata\SecondRefactoring\Rules;

class AdvantageRule extends BaseRule
{

    public function match()
    {
        return ($this->someoneHaveWinMoreThan(self::FORTY_POINTS) &&
            !$this->moreThanOnePointOfDifference());
    }

    public function text()
    {
        return "Advantage " . $this->winningName();
    }

}