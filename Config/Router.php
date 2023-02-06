<?php

class Router
{
   /**
    * Parse l'URL
    * @param string $url
    * @param mixed $request
    * @return array
    */
   static function parse($url, $request)
   {
        $url = trim($url, '/');
        $params = explode('/', $url);
        /*
        $r = array(
            'controller' => $params[0],
            'action' => $params[1] ?? 'index', // Si $params[1] n'existe pas, on lui donne la valeur 'index'
            'params' => array_slice($params, 2)
        );
        return $r;
        */

        //print_r($request);
        $request->controller = $params[0];
        $request->action = $params[1] ?? 'index';
        $request->params = array_slice($params, 2);

        return true;
   }
}

//YO