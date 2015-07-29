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
}