<?php

namespace TennisRefactoringKata\SecondRefactoring;

class AdvantageRule
{
    /**
     * @var Player
     */
    private $firstPlayer;
    /**
     * @var Player
     */
    private $secondPlayer;

    /**
     * SameScoreRule constructor.
     */
    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public function match()
    {
        return $this->someoneHaveWinMoreThan(4) && !$this->moreThanOnePointOfDifference();
    }

    public function text()
    {
        $winning = $this->firstPlayer->score() > $this->secondPlayer->score(
        ) ? 'player1' : 'player2';

        return "Advantage $winning";
    }

    /**
     * @param $points
     * @return bool
     */
    private function someoneHaveWinMoreThan($points)
    {
        return ($this->firstPlayer->score() >= $points || $this->secondPlayer->score() >= $points);
    }

    /**
     * @return bool
     */
    private function moreThanOnePointOfDifference()
    {
        $pointsDifference = $this->firstPlayer->score() - $this->secondPlayer->score();
        return abs($pointsDifference) >= 2;
    }
}