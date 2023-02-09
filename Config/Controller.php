<?php

class Controller
{
    public $request;
    public $vars = array();

    public $layout = 'base';

    private $rendered = false;

    public function __construct($request = null)
    {
        if($request)
        {
           $this->request = $request; 
        }
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

    function e404($message)
    {
        header("HTTP/1.0 404 Not Found");
        $this->set('message', $message);
        $this->render('/error/404');
        die();
    }

    function request($controller, $action)
    {
        $controller .= 'Controller';

        require __ROOT__ . __DS__ . 'Src' . __DS__ . 'Controller' . __DS__ . $controller . '.php';

        $c = new $controller();

        return $c->$action();
    }

    function redirect($url, $code)
    {
        if($code == 301)
        {
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: " . Router::url($url));
    }
}