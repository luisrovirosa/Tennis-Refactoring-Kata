<?php

namespace TennisRefactoringKata\SecondRefactoring;

abstract class BaseRule implements Rule
{
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
    protected function winning()
    {
        $winning = $this->firstPlayer->score() > $this->secondPlayer->score(
        ) ? 'player1' : 'player2';
        return $winning;
    }

    /**
     * @param $points
     * @return bool
     */
    protected function someoneHaveWinMoreThan($points)
    {
        return ($this->firstPlayer->score() >= $points || $this->secondPlayer->score() >= $points);
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