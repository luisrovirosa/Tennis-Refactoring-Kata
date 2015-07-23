<?php

class Player
{
    /** @var string */
    private $name;

    /** @var Score */
    private $scores;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->scores = new Score(0);
    }

    public function wonPoint()
    {
        $this->scores = $this->scores->next();
    }

    /**
     * @return Score
     */
    public function points()
    {
        return $this->scores->points();
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

}