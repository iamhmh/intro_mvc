<?php
class Model
{
	static $connections = array(); 

	public $conf = 'default';
	public $table = false; 
	public $db; 
	public $primaryKey = 'id'; 
	public $id;
	public $validate = [];
	public $errors = [];

	public function __construct()
	{
		// J'initialise qques variable
		if($this->table === false){
			$this->table = strtolower(get_class($this)).'s'; 
		}
		
		// Jme connecte à la base
		$conf = Conf::$databases[$this->conf];
		if(isset(Model::$connections[$this->conf])){
			$this->db = Model::$connections[$this->conf];
			return true; 
		}
		try{
			$pdo = new PDO(
				'mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

			Model::$connections[$this->conf] = $pdo; 
			$this->db = $pdo; 
		}catch(PDOException $e){
			if(Conf::$debug >= 1){
				die($e->getMessage()); 
			}else{
				die('Impossible de se connecter à la base de donnée'); 
			}
		}
	}
	public function find($req = [])
	{
		$sql = 'SELECT ';

		if(isset($req['fields'])){
			if(is_array($req['fields'])){
				$sql .= implode(', ',$req['fields']);
			}else{
				$sql .= $req['fields']; 
			}
		}else{
			$sql.='*';
		}

		$sql .= ' FROM '.$this->table.' as '.get_class($this).' ';

		// Construction de la condition
		if(isset($req['conditions'])){
			$sql .= 'WHERE ';
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions']; 
			}else{
				$cond = array(); 
				foreach($req['conditions'] as $k=>$v){
					if(!is_numeric($v)){
						//$v = '"'.mysql_escape_string($v).'"'; 
						$v = $this->db->quote($v);
					}
					
					$cond[] = "$k=$v";
				}
				$sql .= implode(' AND ',$cond);
			}

		}

		if(isset($req['limit'])){
			$sql .= 'LIMIT '.$req['limit'];
		}



		$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
	public function findFirst($req)
	{
		return current($this->find($req)); 
	}
	public function findCount($conditions)
	{
		$res = $this->findFirst(array(
			'fields' => 'COUNT('.$this->primaryKey.') as count',
			'conditions' => $conditions
			));
		return $res->count;  
	}
	public function delete($id)
	{
		$sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id";
		$this->db->query($sql);
	}
	public function save($data)
	{
		$key = $this->primaryKey;
		$fields = [];
		$d = [];
		foreach($data as $k =>$v)
		{
			if($k != $this->primaryKey)
			{
				$fields[] = "$k=:$k";
				$d[":$k"] = $v;
			}
			elseif(!empty($v))
			{
				$d[":$k"] = $v;
			}
		}
		if(isset($data->$key) && !empty($data->$key))
		{
			$sql = 'UPDATE '.$this->table.' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
			$this->id = $data->$key;
			$action = 'update';
		}
		else
		{
			$sql = 'INSERT INTO '.$this->table.' SET '.implode(',',$fields);
			$action = 'insert';
		}
		$pre = $this->db->prepare($sql);
		$pre->execute($d);

		if($action == 'insert')
		{
			$this->id = $this->db->lastInsertId();
		}
	}
	public function validates($data)
	{
		$errors = [];
		foreach($this->validate as $k => $v)
		{
			if(!isset($data->$k))
			{
				$errors[$k] = $v['message'];
			}
			else
			{
				if($v['rule'] == 'notEmpty')
				{
					if(empty($data->$k))
					{
						$errors[$k] = $v['message'];
					}
				}
				elseif(!preg_match('/^'.$v['rule'].'$/',$data->$k))
				{
					$errors[$k] = $v['message'];
				}
			}
		}
		$this->errors = $errors;
		if(isset($this->Form))
		{
			$this->Form->errors = $errors;
		}
		if(empty($errors))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}