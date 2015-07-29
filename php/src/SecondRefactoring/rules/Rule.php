<?php

namespace TennisRefactoringKata\SecondRefactoring\Rules;

interface Rule
{
    /**
     * @return boolean
     */
    public function match();

    /**
     * @return string
     */
    public function text();

}