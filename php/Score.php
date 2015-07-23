<?php

class Score
{
    private $points;

    /**
     * Score constructor.
     * @param int $points
     */
    public function __construct($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function points()
    {
        return $this->points;
    }

    public function next()
    {
        return new Score($this->points + 1);
    }

}