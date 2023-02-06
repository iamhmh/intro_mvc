<?php

class Dispatcher
{
    /**
    * @var \Request $request;
    */
    var $request;
    
    public function __construct()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        if(!in_array($this->request->action, get_class_methods($controller)))
        {
            $this->error('Le controller ' . $this->request->controller . ' n\'a pas de méthode ' . $this->request->action);
        }
        call_user_func_array(array($controller, $this->request->action), $this->request->params);

        $controller->render($this->request->action);
    }

    function loadController()
    {
        $name = ucfirst($this->request->controller) . 'Controller';
        $file = __ROOT__ . __DS__ . 'Src/Controller' . __DS__ . $name . '.php';
        require $file;
        return new $name($this->request);
    }

    function error($message)
    {
        header("HTTP/1.0 404 Not Found");
        $controller = new Controller($this->request);
        $controller->set('message', $message);
        $controller->render('/error/404');
        die();
    }
}