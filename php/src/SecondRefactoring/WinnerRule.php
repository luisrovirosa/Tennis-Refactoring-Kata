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
        $winning = $this->firstPlayer->score() > $this->secondPlayer->score(
        ) ? 'player1' : 'player2';

        return "Win for $winning";
    }

    /**
     * @param $points
     * @return bool
     */
    private function someoneHaveWinMoreThan($points)
    {
        return ($this->firstPlayer->score() >= $points || $this->secondPlayer->score() >= $points);
    }

    /**
     * @return bool
     */
    private function moreThanOnePointOfDifference()
    {
        $pointsDifference = $this->firstPlayer->score() - $this->secondPlayer->score();
        return abs($pointsDifference) >= 2;
    }
}