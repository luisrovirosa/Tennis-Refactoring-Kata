<?php

namespace TennisRefactoringKata\SecondRefactoring;

class NormalRule extends BaseRule
{

    /**
     * @return boolean
     */
    public function match()
    {
        return true;
    }

    /**
     * @return string
     */
    public function text()
    {
        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        $p1res = $scores[min(3, $this->firstPlayer->score())];
        $p2res = $scores[min(3, $this->secondPlayer->score())];

        return "{$p1res}-{$p2res}";
    }
}