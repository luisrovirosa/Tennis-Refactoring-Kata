<?php

class Result
{
    /** @var Rule[] */
    private $rules;

    /**
     * Score constructor.
     * @param Player $firstPlayer
     * @param Player $secondPlayer
     */
    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->rules = [
            new BothScoresRule($firstPlayer, $secondPlayer),
            new TiedRule($firstPlayer, $secondPlayer),
            new WinningRule($firstPlayer, $secondPlayer),
            new AdvantageRule($firstPlayer, $secondPlayer),
        ];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function toString()
    {
        foreach ($this->rules as $rule) {
            if ($rule->isMatch()) {
                return $rule->execute();
            }
        }
        throw new Exception('I don\'t know how the result');
    }

}