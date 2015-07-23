<?php

class Player
{
    /** @var string */
    private $playerName;

    /** @var int */
    private $scores;

    /**
     * @param $playerName
     */
    public function __construct($playerName)
    {
        $this->playerName = $playerName;
        $this->scores = 0;
    }

    public function wonPoint()
    {
        $this->scores++;
    }

    /**
     * @return int
     */
    public function scores()
    {
        return $this->scores;
    }

}