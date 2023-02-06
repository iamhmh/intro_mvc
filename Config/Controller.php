<?php

class Controller
{
    public $request;
    public $vars = array();

    public $layout = 'base';

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function render($view)
    {

        extract($this->vars);

        $view = __ROOT__ . __DS__ . 'Template' . __DS__ . $this->request->controller . __DS__ . $view . '.php';

        ob_start();

        require $view;

        $content_for_layout = ob_get_clean();

        require __ROOT__ . __DS__ . 'Template' . __DS__ . $this->layout . '.php';
    }

    public function set($key, $value = null)
    {
        if(is_array($key))
        {
            $this->vars += $key;
        }
        else 
        {
            $this->vars[$key] = $value;
        }
    }
}