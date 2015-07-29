<?php

namespace TennisRefactoringKata\SecondRefactoring\Rules;

class WinnerRule extends BaseRule
{

    /**
     * @return boolean
     */
    public function match()
    {
        return ($this->someoneHaveWinMoreThan(self::FORTY_POINTS) &&
            $this->moreThanOnePointOfDifference());
    }

    /**
     * @return string
     */
    public function text()
    {
        return "Win for " . $this->winningName();
    }

}