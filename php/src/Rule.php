<?php

interface Rule
{

    public function isMatch();

    public function execute();
}