<?php

class Player
{
    /** @var string */
    private $name;

    /** @var Score */
    private $score;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->score = Score::love();
    }

    public function wonPoint()
    {
        $this->score = $this->score->next();
    }

    /**
     * @return int
     */
    public function points()
    {
        return $this->score->points();
    }

    public function score()
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

}