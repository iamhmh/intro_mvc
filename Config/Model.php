<?php

class Model
{
    public function __construct()
    {
        //print_r(ConnexionDB::$database);
    }
    public function find($req)
    {
        $sql = 'SELECT * FROM posts ';

        if(isset($req['conditions']))
        {
            
        }
    }
}