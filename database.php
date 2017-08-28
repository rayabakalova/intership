<?php

class MyDatabase {
	private $config;
	private $myDatabase;
	protected static $init = null;

	public function __construct() {
		$this->connect();
	}

	private function config() {
		$this->config = [
	'adapter' => 'mysql',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'parola123',
	'database' => 'intership',
	'character' => 'utf8',
	'prefix' => ''
	];
	}

	private function connect() {
		$this->config();
		try {
			$this->myDatabase = new \PDO($this->config['adapter'].':host='.$this->config['server'].'; dbname='.$this->config['database'], $this->config['username'], $this->config['password']);
			$this->myDatabase->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->myDatabase->exec('SET CHARACTER SET '.$this->config['character']);
		} catch (\PDOException $e) {
			echo $e->getMessage();
			exit();
		}
	}

	public function query($sql) {
		try {
			$sql = $this->prefix($sql);
			$query = $this->myDatabase->prepare($sql);
			$query->execute();
			$search = substr($sql, 0, 7);
			if(preg_match('/SELECT/', $search)) {
				return $query->fetchAll();
			} else if(preg_match('/INSERT/', $search)) {
        return $this->myDatabase->lastInsertId();
			} else if(preg_match('/DELETE/', $search) || preg_match('/UPDATE/', $search)) {
        return true;
			} else {
				return false;
			}
		} catch (\PDOException $e) {
			echo $e->getMessage();
			exit();
		}
	}

	public function sqlJoin($data) {
    $data['rows0'] = $data['table0'].'.'.implode(', '.$data['table0'].'.', $data['rows0']);
    $data['rows0'] = str_replace('table0', $data['table0'], $data['rows0']);
    $data['rows1'] = $data['table1'].'.'.implode(', '.$data['table1'].'.', $data['rows1']);
    $data['rows1'] = str_replace('table1', $data['table1'], $data['rows1']);
    foreach($data['on'] as $key => $val) {
      $key = str_replace('table0', $data['table0'], $key);
      $val[1] = str_replace('table1', $data['table1'], $val[1]);
      $on[] = $key.$val[0].$val[1];
    }
    $data['on'] = implode(' AND ', $on);
    $sql = $data['action']." ".$data['rows0'].", ".$data['rows1']." FROM ".$data['table0']." JOIN ".$data['table1']." ON ".$data['on']."";
		$data = null; unset($data);
    return $sql;
  }

	public function queryJoin($data) {
		$sql = $this->sqlJoin($data);
		$query = $this->myDatabase->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}

	public function prefix($sql) {
		$pattern = ':prefix:';
		if(preg_match('/'.$pattern.'/', $sql)) {
			return str_replace($pattern, $this->config['prefix'].'_', $sql);
		}
		return str_replace($pattern, '', $sql);
	}

	public static function init() {
		if(null === self::$init)
			self::$init = new self;

		return self::$init;
	}

	public function __clone() {
		trigger_error(__CLASS__, E_USER_ERROR);
	}
}
