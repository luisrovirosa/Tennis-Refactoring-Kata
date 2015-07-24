<?php

class IsAdvantageRule extends TennisRule
{

    public function isMatch()
    {
        $difference = $this->firstScore()->points() - $this->secondScore()->points();
        return ($this->moreThanForty($this->firstScore())
            || $this->moreThanForty($this->secondScore()))
        && abs($difference) < 2;
    }

    public function execute()
    {
        $winningPlayer = $this->winningPlayer();
        return "Advantage $winningPlayer";
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