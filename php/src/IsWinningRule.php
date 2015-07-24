<?php

class IsWinningRule extends TennisRule
{

    public function isMatch()
    {
        return $this->anyPlayerHaveMoreThanForty() && $this->haveAtLeast2PointsOfDifference();
    }

    public function execute()
    {
        return "Win for " . $this->winningPlayer();
    }

    private function haveAtLeast2PointsOfDifference()
    {
        return !$this->haveLessThan2PointsOfDifference();
    }

}