<?php

class Result
{
    const FORTY_POINTS = 3;

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
            new IsWinningRule($firstPlayer, $secondPlayer)
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

        if ($this->isAdvantage()) {
            $result = $this->advantageResult();
        } else {
            $result = $this->normalResult();
        }
        return $result;
    }

    /**
     * @return bool
     */
    private function isTied()
    {
        return $this->firstPlayer->score() == $this->secondPlayer->score();
    }

    /**
     * @return bool
     */
    private function isAdvantage()
    {
        return $this->moreThanForty($this->firstScore())
        || $this->moreThanForty($this->secondScore());
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
     * @param Score $score
     * @return bool
     */
    private function moreThanForty(Score $score)
    {
        return $score->points() > self::FORTY_POINTS;
    }

    /**
     * @return Player|null
     */
    private function winningPlayer()
    {
        if ($this->isTied()) {
            return null;
        }
        return $this->firstScore()->greaterThan($this->secondScore()) ?
            $this->firstPlayer :
            $this->secondPlayer;
    }

    /**
     * @return string
     */
    private function normalResult()
    {
        return "{$this->firstScore()}-{$this->secondScore()}";
    }

    /**
     * @return string
     */
    private function advantageResult()
    {
        $winningPlayer = $this->winningPlayer();
        return "Advantage $winningPlayer";
    }
}