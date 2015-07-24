<?php

class IsNormalRule extends TennisRule
{

    public function isMatch()
    {
        return true;
    }

    public function execute()
    {
        return "{$this->firstScore()}-{$this->secondScore()}";
    }
}