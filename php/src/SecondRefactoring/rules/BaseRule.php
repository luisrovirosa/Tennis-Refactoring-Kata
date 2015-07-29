<?php

namespace TennisRefactoringKata\SecondRefactoring\Rules;

use TennisRefactoringKata\SecondRefactoring\Player;

abstract class BaseRule implements Rule
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
     * SameScoreRule constructor.
     * @param Player $firstPlayer
     * @param Player $secondPlayer
     */
    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    /**
     * @return string
     */
    protected function winningName()
    {
        $winningPlayer = $this->firstPlayer->isWinning($this->secondPlayer) ?
            $this->firstPlayer : $this->secondPlayer;

        return $winningPlayer->name();
    }

    /**
     * @param $points
     * @return bool
     */
    protected function someoneHaveWinMoreThan($points)
    {
        return ($this->firstPlayer->morePointsThan($points) ||
            $this->secondPlayer->morePointsThan($points));
    }

    /**
     * @return bool
     */
    protected function moreThanOnePointOfDifference()
    {
        $pointsDifference = $this->firstPlayer->score() - $this->secondPlayer->score();
        return abs($pointsDifference) >= 2;
    }
}