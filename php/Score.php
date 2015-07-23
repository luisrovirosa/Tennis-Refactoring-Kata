<?php

class Score
{
    private $points;

    /**
     * Score constructor.
     * @param int $points
     */
    private function __construct($points)
    {
        $this->points = $points;
    }

    public static function love()
    {
        return new Score(0);
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