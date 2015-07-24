<?php

class IsTiedRule extends TennisRule
{
    public function isMatch()
    {
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }

    public function execute()
    {
        $isDeuce = $this->firstScore()->points() >= self::FORTY_POINTS;
        return $isDeuce ? 'Deuce' : "{$this->firstScore()}-All";
    }

}