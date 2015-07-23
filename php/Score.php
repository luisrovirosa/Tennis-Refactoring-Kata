<?php

class Score
{
    /** @var int */
    private $points;
    /** @var  string */
    private $name;

    private static $names = ["Love", "Fifteen", "Thirty", "Forty"];

    /**
     * Score constructor.
     * @param string $name
     * @param int $points
     */
    private function __construct($name, $points)
    {
        $this->points = $points;
        $this->name = $name;
    }

    public static function love()
    {
        return new Score('Love', 0);
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
        $nextValue = $this->points + 1;
        return new Score($this->nameFor($nextValue), $nextValue);
    }

    /**
     * @param $nextValue
     * @return mixed
     */
    private function nameFor($nextValue)
    {
        return isset(self::$names[$nextValue]) ? self::$names[$nextValue] : null;
    }

    public function toString()
    {
        return $this->name;
    }

}