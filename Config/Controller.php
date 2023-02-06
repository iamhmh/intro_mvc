<?php

class Controller
{
    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function render($view)
    {
        $view = __ROOT__ . __DS__ . 'Template' . __DS__ . $this->request->controller . __DS__ . $view . '.php';

        echo $view;
    }
}