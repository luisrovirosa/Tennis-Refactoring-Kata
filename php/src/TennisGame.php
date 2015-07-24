<?php
namespace TennisRefactoringKata;

interface TennisGame
{
    /**
     * @param  $playerName
     * @return void
     */
    public function wonPoint($playerName);

    /**
     * @return string
     */
    public function getScore();
}
