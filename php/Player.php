<?php

class Player
{
    private $playerName;

    /**
     * @param $playerName
     */
    public function __construct($playerName)
    {
        $this->playerName = $playerName;
    }
}