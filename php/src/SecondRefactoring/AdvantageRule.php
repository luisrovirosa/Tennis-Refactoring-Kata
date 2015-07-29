<?php

namespace TennisRefactoringKata\SecondRefactoring;

class AdvantageRule extends BaseRule
{

    public function match()
    {
        return $this->someoneHaveWinMoreThan(4) && !$this->moreThanOnePointOfDifference();
    }

    public function text()
    {
        return "Advantage " . $this->winning();
    }

}