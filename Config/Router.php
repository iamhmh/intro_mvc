<?php

class Router
{
    static $routes = [];

    /**
    * Parse l'URL
    * @param string $url
    * @param mixed $request
    * @return array
    */
    static function parse($url, $request)
    {
        $url = trim($url, '/');

        if(empty($url))
        {
            $url = Router::$routes[0][$url];
        }
        else
        {
            foreach(Router::$routes as $v)
            {
                if(preg_match($v['catcher'], $url, $match))
                {
                    $request->controller = $v['controller'];
                    $request->action = isset($match['action']) ? $match['action'] : $v['action'];
                    $request->params = [];
                    foreach($v['params'] as $k => $v)
                    {
                        $request->params['$k'] = $match[$k];
                    }
                    if(!empty($match['args']))
                    {
                        $request->params += explode('/', trim($match['args'], '/'));
                    }
                    return $request;
                }
            }
        }
        $params = explode('/', $url);
       
        $request->controller = $params[0];
        $request->action = $params[1] ?? 'index';
        $request->params = array_slice($params, 2);

        return true;
    }
    static function connect($redir, $url)
    {
        $r = [];
        $r['params'] = [];
        $r['url'] = $url;
        $r['redir'] = $redir;
        $r['origin'] = str_replace(':action', '(?P<action>([a-z0-9\-]+))', $url);
        $r['origin'] = preg_replace('/([a-z0-9]+):([^\/]+)/', '${1}:(?P<${1}>${2})', $r['origin']);
        $r['origin'] = '/^' . str_replace('/', '\/', $r['origin']) . '(?P<args>\/?.*)$/';

        $params = explode('/', $url);
        foreach($params as $k => $v)
        {
            
        }
        dd($r);
    }
}