<?php

class Model
{
    public $db = 'default';


    public function __construct()
    {
        $conf = ConnexionDB::$database[$this->db];
        try
        {
        $pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'], $conf['user'], $conf['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
    public function find($req)
    {
        $sql = 'SELECT * FROM posts';

        if(isset($req['conditions']))
        {
            
        }
    }
}