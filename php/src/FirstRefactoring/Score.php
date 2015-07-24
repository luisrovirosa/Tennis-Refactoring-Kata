<?php

namespace TennisRefactoringKata\FirstRefactoring;

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

    /**
     * @return Score
     */
    public static function love()
    {
        return new Score('Love', 0);
    }

    /**
     * @return int
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

    /**
     * @param Score $otherScore
     * @return bool
     */
    public function isGreaterThan(Score $otherScore)
    {
        return $this->points > $otherScore->points;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->name;
    }

}