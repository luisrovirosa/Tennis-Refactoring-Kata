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