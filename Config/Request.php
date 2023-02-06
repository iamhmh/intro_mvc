<?php

class Request
{
    /**
     * Appel de l'URL
     * @var mixed $url
     */
    public $url;
    public function __construct()
    {
        //echo $_SERVER['PATH_INFO'];
        $this->url = $_SERVER['PATH_INFO'];
    }
}