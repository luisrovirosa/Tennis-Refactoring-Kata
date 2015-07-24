<?php
namespace TennisRefactoringKata\FirstRefactoring\Rules;

use TennisRefactoringKata\FirstRefactoring\Player;
use TennisRefactoringKata\FirstRefactoring\Score;

abstract class TennisRule implements Rule
{

    const FORTY_POINTS = 3;

    /**
     * @var Player
     */
    protected $firstPlayer;

    /**
     * @var Player
     */
    protected $secondPlayer;

    /**
     * IsTiedRule constructor.
     * @param Player $firstPlayer
     * @param Player $secondPlayer
     */
    public function __construct($firstPlayer, $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public abstract function isMatch();

    public abstract function execute();

    /**
     * @return Score
     */
    protected function firstScore()
    {
        return $this->firstPlayer->score();
    }

    /**
     * @return Score
     */
    protected function secondScore()
    {
        return $this->secondPlayer->score();
    }

    /**
     * @return Player|null
     */
    protected function winningPlayer()
    {
        if ($this->firstScore() == $this->secondScore()) {
            return null;
        }

        return $this->firstScore()->isGreaterThan($this->secondScore()) ?
            $this->firstPlayer :
            $this->secondPlayer;
    }

    /**
     * @param Score $score
     * @return bool
     */
    protected function moreThanForty(Score $score)
    {
        return $score->points() > TennisRule::FORTY_POINTS;
    }

    /**
     * @return bool
     */
    protected function anyPlayerHaveMoreThanForty()
    {
        return $this->moreThanForty($this->firstScore())
        || $this->moreThanForty($this->secondScore());
    }

    /**
     * @return bool
     */
    protected function haveLessThan2PointsOfDifference()
    {
        $difference = $this->firstScore()->points() - $this->secondScore()->points();

        return abs($difference) < 2;
    }

    /**
     * @return bool
     */
    protected function hasSameScore()
    {
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }
}