<?php

class Result
{
    /** @var Player */
    private $firstPlayer;

    /** @var Player */
    private $secondPlayer;

    /** @var Rule[] */
    private $rules;

    /**
     * Score constructor.
     * @param Player $firstPlayer
     * @param Player $secondPlayer
     */
    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
        $this->rules = [
            new IsTiedRule($firstPlayer, $secondPlayer),
            new IsWinningRule($firstPlayer, $secondPlayer),
            new IsAdvantageRule($firstPlayer, $secondPlayer)
        ];
    }

    /**
     * @return string
     */
    public function toString()
    {
        foreach ($this->rules as $rule) {
            if ($rule->isMatch()) {
                return $rule->execute();
            }
        }

        return $this->normalResult();
    }

    /**
     * @return Score
     */
    private function firstScore()
    {
        return $this->firstPlayer->score();
    }

    /**
     * @return Score
     */
    private function secondScore()
    {
        return $this->secondPlayer->score();
    }

    /**
     * @return string
     */
    private function normalResult()
    {
        return "{$this->firstScore()}-{$this->secondScore()}";
    }

}