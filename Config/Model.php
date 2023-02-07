<?php

class Model
{
    public function __construct()
    {
        
    }

    public function find($req)
    {
        $sql = 'SELECT * FROM posts ';

        if(isset($req['conditions']))
        {
            
        }
    }
}