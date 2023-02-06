<?php

class Controller
{
    public $request;
    public $vars = array();

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function render($view)
    {

        extract($this->vars);

        $view = __ROOT__ . __DS__ . 'Template' . __DS__ . $this->request->controller . __DS__ . $view . '.php';

        require $view;
    }

    public function set($key, $value = null)
    {
        $this->vars[$key] = $value;
    }
}