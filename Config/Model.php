<?php

class Model
{
    static $connexion = array();

    public $conf = 'default';
    public $table = false;
    public $db;

    public function __construct()
    {
        $conf = ConnexionDB::$database[$this->conf];

        if(isset(Model::$connexion[$this->conf]))
        {
            return true;
        }
        try
        {
            $pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'], 
                                                                  $conf['user'], 
                                                                  $conf['password'], 
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            
            Model::$connexion[$this->conf] = $pdo;

        }catch(PDOException $e)
        {
            if(ConnexionDB::$debug >= 1)
            {
                die($e->getMessage());
            }
            else
            {
                die('Impossible de se connecter à la base de données');
            }
        }
        echo 'Connexion réussie';
    }


    public function find($req)
    {
        $sql = 'SELECT * FROM posts';

        if(isset($req['conditions']))
        {
            
        }
    }
}