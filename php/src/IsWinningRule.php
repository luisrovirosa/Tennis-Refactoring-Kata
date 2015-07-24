<?php

class IsWinningRule implements Rule
{
    const FORTY_POINTS = 3;

    /**
     * @var Player
     */
    private $firstPlayer;
    /**
     * @var Player
     */
    private $secondPlayer;

    /**
     * IsTiedRule constructor.
     * @param Player $firstPlayer
     * @param Player $secondPlayer
     */
    public function __construct($firstPlayer, $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public function isMatch()
    {
        return ($this->moreThanForty($this->firstScore())
            || $this->moreThanForty($this->secondScore())) &&
        $this->isFinished();
    }

    public function execute()
    {
        $winningPlayer = $this->winningPlayer();
        return "Win for $winningPlayer";
    }

    private function isFinished()
    {
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
     * @return Player|null
     */
    private function winningPlayer()
    {
        return $this->firstScore()->greaterThan($this->secondScore()) ?
            $this->firstPlayer :
            $this->secondPlayer;
    }
}