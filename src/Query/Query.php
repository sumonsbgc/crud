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

	public function insert(array $data, $table = "model")
	{
		// You should bear in mind that your table's field names are equal to form field names
		// other wise this method will not work.

		$datakey = [];
		$datavalue = [];

		foreach ($data as $key => $value) {
			$datakey[] = $key;
			$datavalue[] = $value;
		}

		array_pop($datakey);
		array_pop($datavalue);

		$countValue = count($datakey) - 1;

		$sql = "INSERT INTO `{$table}`(";
		
		foreach ($datakey as $i => $key) {
			if ($countValue == $i) {
				$sql .= "`{$key}`";					
			}else{
				$sql .= "`{$key}`" . ",";	
			}
		}

		$sql .=	") VALUES ("; 
		foreach ($datavalue as $i => $value) {
			if ($countValue == $i) {
				$sql .= "'{$value}'";
			}else{
				$sql .= "'{$value}'" . ",";	
			}
		}
		$sql .= ")";


		$result = $this->conn->query($sql);
		var_dump($result);
		if($result)
		{
			echo "Data inserted successfully.";
		}else{
			echo "Data is not inserted.";
		}
	}







	
}
