<?php

namespace TennisRefactoringKata\SecondRefactoring;

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