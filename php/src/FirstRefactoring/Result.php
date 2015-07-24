<?php

namespace TennisRefactoringKata\FirstRefactoring;

use TennisRefactoringKata\FirstRefactoring\Rules\AdvantageRule;
use TennisRefactoringKata\FirstRefactoring\Rules\BothScoresRule;
use TennisRefactoringKata\FirstRefactoring\Rules\Rule;
use TennisRefactoringKata\FirstRefactoring\Rules\TiedRule;
use TennisRefactoringKata\FirstRefactoring\Rules\WinningRule;

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
     * @throws \Exception
     */
    public function toString()
    {
        return $this->result();
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function result()
    {
        foreach ($this->rules as $rule) {
            if ($rule->isMatch()) {
                return $rule->execute();
            }
        }
        throw new \Exception('I don\'t know how the result');
    }

}