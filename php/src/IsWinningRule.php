<?php

class IsWinningRule extends TennisRule
{

    public function isMatch()
    {
        return $this->isFinished();
    }

    public function execute()
    {
        return "Win for " . $this->winningPlayer();
    }

    private function isFinished()
    {
        if (!($this->moreThanForty($this->firstScore()) ||
            $this->moreThanForty($this->secondScore()))
        ) {
            return false;
        }
        $difference = $this->firstScore()->points() - $this->secondScore()->points();
        return abs($difference) >= 2;
    }

    /**
     * @param Score $score
     * @return bool
     */
    private function moreThanForty(Score $score)
    {
        return $score->points() > self::FORTY_POINTS;
    }

    /**
     * @return Player|null
     */
    private function winningPlayer()
    {
        return $this->firstScore()->greaterThan($this->secondScore()) ?
            $this->firstPlayer :
            $this->secondPlayer;
    }
}