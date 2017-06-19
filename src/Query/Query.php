<?php namespace App\Query;

class Query
{
	protected $conn;
	public $fname = "";
	public $lname = "";
	public $email = "";
	public $pass  = "";

	public function __construct()
	{
		if (!isset($this->conn)) {
			$this->conn = new \mysqli("localhost", "root", "sumon", "crud") or die("Connection Fail!");	
		}

		if (!$this->conn) {
			echo "Connection Fail";
			exit;
		}
	}

/*	public function prepare(array $data)
	{
		if(array_key_exists('fname', $data)) {
			$this->fname = $data['fname'];
		}

		if (array_key_exists('lname', $data)) {
			$this->lname = $data['lname'];
		}

		if (array_key_exists('email', $data)) {
			$this->email = $data['email'];
		}

		if (array_key_exists('pass', $data)) {
			$this->pass = $data['pass'];
		}

		return $this;
	}
*/

	public function store(array $data, $table = "model")
	{
		
		$countValue = count($data);
		
		$sql = "INSERT INTO `{$table}`"; 

		foreach ($data as $key => $value) {
			$sql =. "(`{$key}`)";	
		}
		
		$sql =. " VALUES "; 
		foreach ($data as $key => $value) {
			$sql =. "('{$value}');";	
		}


		echo $sql;

/*		
		$result = $this->conn->query($sql);
		var_dump($result);
		if($result)
		{
			echo "Data inserted successfully.";
		}else{
			echo "Data is not inserted.";
		}
*/
	}	
	
}
