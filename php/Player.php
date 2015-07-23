<?php

class Player
{
    /** @var string */
    private $name;

    /** @var int */
    private $scores;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
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

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

}