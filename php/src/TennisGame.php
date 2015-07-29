<?php
namespace TennisRefactoringKata;

interface TennisGame
{
    /**
     * @param  $playerNameName
     * @return void
     */
    public function wonPoint($playerNameName);

    /**
     * @return string
     */
    public function getScore();
}
