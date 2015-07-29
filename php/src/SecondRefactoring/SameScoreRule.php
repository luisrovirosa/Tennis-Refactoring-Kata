<?php

namespace TennisRefactoringKata\SecondRefactoring;

class SameScoreRule
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
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }

    public function text()
    {
        $scores = ['Love-All', 'Fifteen-All', 'Thirty-All', 'Deuce'];
        $points = min(3, $this->firstPlayer->score());
        return $scores[$points];
    }
}