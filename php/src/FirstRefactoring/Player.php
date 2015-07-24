<?php

namespace TennisRefactoringKata\FirstRefactoring;

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

    /**
     * @return Score
     */
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

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->name();
    }

}