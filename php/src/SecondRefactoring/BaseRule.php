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
}