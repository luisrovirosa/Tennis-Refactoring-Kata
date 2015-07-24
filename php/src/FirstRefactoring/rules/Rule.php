<?php

namespace TennisRefactoringKata\FirstRefactoring\Rules;

interface Rule
{

    /**
     * @return boolean
     */
    public function isMatch();

    /**
     * @return string
     */
    public function execute();
}