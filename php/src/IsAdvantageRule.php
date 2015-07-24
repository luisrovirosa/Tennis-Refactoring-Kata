<?php

class IsAdvantageRule extends TennisRule
{

    public function isMatch()
    {
        return $this->anyPlayerHaveMoreThanForty() && $this->haveLessThan2PointsOfDifference();
    }

    public function execute()
    {
        return "Advantage " . $this->winningPlayer();
    }

}