<?php

class Session
{
    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
}