<?php

class Controller
{
    public $request;
    public $vars = array();

    public $layout = 'base';

    private $rendered = false;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function render($view)
    {
        if($this->rendered)
        {
            return false;
        }

        extract($this->vars);

        if(strpos($view, '/') === 0)
        {
            $view = __ROOT__ . __DS__ . 'Template' . $view . '.php';
        }
        else
        {
            $view = __ROOT__ . __DS__ . 'Template' . __DS__ . $this->request->controller . __DS__ . $view . '.php';
        }

        ob_start();

        require $view;

        $content_for_layout = ob_get_clean();

        require __ROOT__ . __DS__ . 'Template' . __DS__ . $this->layout . '.php';

        $this->rendered = true;
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

    function loadModel($name)
    {
        if(!isset($this->$name))
        {
            $file = __ROOT__ . __DS__ . 'Src' . __DS__ . 'Model' . __DS__ . $name . '.php';
            require_once($file);
            $this->$name = new $name();
        }
        else
        {
            echo 'Le model n`\'existe pas';
        }
    }
}