<?php

class Result
{
    const FORTY_POINTS = 3;

    /** @var Player */
    private $firstPlayer;

    /** @var Player */
    private $secondPlayer;

    /**
     * Score constructor.
     * @param Player $firstPlayer
     * @param Player $secondPlayer
     */
    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    /**
     * @return string
     */
    public function toString()
    {
        if ($this->hasSameScore()) {
            $isDeuce = $this->firstScore()->points() >= self::FORTY_POINTS;
            $result = $isDeuce ? 'Deuce' : "{$this->firstScore()}-All";
        } elseif ($this->haveBeenDeuce()) {
            $winningPlayer = $this->winningPlayer();
            $result = $this->isFinished() ?
                "Win for $winningPlayer" :
                "Advantage $winningPlayer";
        } else {
            $result = "{$this->firstScore()}-{$this->secondScore()}";
        }
        return $result;
    }

    /**
     * @return bool
     */
    private function hasSameScore()
    {
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }

    /**
     * @return bool
     */
    private function haveBeenDeuce()
    {
        return $this->moreThanForty($this->firstScore())
        || $this->moreThanForty($this->secondScore());
    }

    /**
     * @return Score
     */
    private function firstScore()
    {
        return $this->firstPlayer->score();
    }

    /**
     * @return Score
     */
    private function secondScore()
    {
        return $this->secondPlayer->score();
    }

    /**
     * @param Score $score
     * @return bool
     */
    private function moreThanForty(Score $score)
    {
        return $score->points() > self::FORTY_POINTS;
    }

    private function isFinished()
    {
        $difference = $this->firstScore()->points() - $this->secondScore()->points();
        return abs($difference) >= 2;
    }

    /**
     * @return Player|null
     */
    private function winningPlayer()
    {
        if ($this->hasSameScore()) {
            return null;
        }
        return $this->firstScore()->greaterThan($this->secondScore()) ?
            $this->firstPlayer :
            $this->secondPlayer;
    }
}