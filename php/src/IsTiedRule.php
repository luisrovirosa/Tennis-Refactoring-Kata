<?php

class IsTiedRule implements Rule
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
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }

    public function execute()
    {
        $isDeuce = $this->firstScore()->points() >= self::FORTY_POINTS;
        return $isDeuce ? 'Deuce' : "{$this->firstScore()}-All";
    }

    /**
     * @return Score
     */
    private function firstScore()
    {
        return $this->firstPlayer->score();
    }

}