<?php

namespace TennisRefactoringKata\SecondRefactoring;

class WinnerRule extends BaseRule
{

    /**
     * @return boolean
     */
    public function match()
    {
        return $this->someoneHaveWinMoreThan(4) && $this->moreThanOnePointOfDifference();
    }

    /**
     * @return string
     */
    public function text()
    {
        return "Win for " . $this->winning();
    }

}