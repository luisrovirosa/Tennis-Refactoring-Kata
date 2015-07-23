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
     * @param $firstPlayer
     * @param $secondPlayer
     */
    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public function toString()
    {
        if ($this->hasSameScore()) {
            $isDeuce = $this->firstScore()->points() >= self::FORTY_POINTS;
            $result = $isDeuce ?
                'Deuce' :
                $this->firstScore()->toString() . '-All';
        } elseif ($this->haveBeenDeuce()) {
            $isFirstPlayerWinning = $this->firstScore()->greaterThan($this->secondScore());
            if ($this->isFinished()) {
                if ($isFirstPlayerWinning) {
                    $result = "Win for player1";
                } else {
                    $result = "Win for player2";
                }
            } else {
                if ($isFirstPlayerWinning) {
                    $result = "Advantage player1";
                } else {
                    $result = "Advantage player2";
                }
            }
        } else {
            $result = $this->firstScore()->toString() .
                '-' .
                $this->secondScore()->toString();
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
        $firstPlayerScore = $this->firstPlayer->score();
        return $firstPlayerScore;
    }

    /**
     * @return Score
     */
    private function secondScore()
    {
        $secondPlayerScore = $this->secondPlayer->score();
        return $secondPlayerScore;
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
}