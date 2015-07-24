<?php

abstract class TennisRule implements Rule
{

    const FORTY_POINTS = 3;
    /**
     * @var Player
     */
    protected $firstPlayer;
    /**
     * @var Player
     */
    protected $secondPlayer;

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

    public abstract function isMatch();

    public abstract function execute();

    /**
     * @return Score
     */
    protected function firstScore()
    {
        return $this->firstPlayer->score();
    }

    /**
     * @return Score
     */
    protected function secondScore()
    {
        return $this->secondPlayer->score();
    }
}