<?php

class ConnexionDB
{
    static $debug = 1;

    static $database = array(
        'default' => array(
            'host' => 'localhost',
            'database' => 'db_uml',
            'user' => 'root',
            'password' => ''
        )
    );
}
Router::connect('/','posts/index');
Router::connect('/blog/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('/blog/:action','posts/:action');