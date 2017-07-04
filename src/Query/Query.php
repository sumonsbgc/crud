<?php namespace App\Query;

class Query
{
	protected $conn;
	/*public $fname = "";
	public $lname = "";
	public $email = "";
	public $pass  = "";*/

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
		echo "<hr>";
		echo $sql;
		echo "<hr>";
		$result = $this->conn->query($sql);
		
		if($result)
		{
			echo "Data inserted successfully.";
		}else{
			echo "Data is not inserted.";
		}
	}


	public function insert(array $data, $table = "model")
	{
		
		$select = "SELECT * FROM `$table`";
		$selectResult = $this->conn->query($select);

		$datakey = [];
		$datavalue = [];

		while ($field = mysqli_fetch_field($selectResult)) {
			$datakey[] = $field->name;
		}		

		foreach ($data as $key => $value) {
			$datavalue[] = $value;
		}

		array_shift($datakey);
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

		if($result)
		{
			echo "Data inserted successfully.";
		}else{
			echo "Data is not inserted.";
		}

	}

	public function selectAll($table = "model")
	{
		$sql = "SELECT * FROM `$table`";
		$result = $this->conn->query($sql);
		$data = [];

		while($row = $result->fetch_object())
		{	
			$data[] = $row;
		}

		return $data;
	}

	public function selectBywhere( $table, $where)
	{
		
		if (is_array($where)) {
			
			$sql = "SELECT * FROM `{$table}` WHERE `id` = '{$where}'";
			foreach ($data as $key => $value) {
				$sql .= " `$key` = '{$value}'";
			}

		}else{
			$sql = "SELECT * FROM `{$table}` WHERE `id` = '{$where}'";
		}
		
		$result = $this->conn->query($sql);
		
		$row = $result->fetch_object();

		return $row;
	}

	public function update($data, $table = 'model', $where)
	{
		$datakey = [];
		$datavalue = [];
		$sqlValue = [];


		$select = "SELECT * FROM $table";
		$selRes = $this->conn->query($select);
	
		while($field = $selRes->fetch_field()){
			$datakey[] = $field->name;
		}
		
		foreach ($data as $key => $value) {
			$datavalue[] = $value;
		}

		array_pop($datavalue);
		
		if (count($datakey) == count($datavalue)) {
			$sqlValue = array_combine($datakey, $datavalue);
		}

		array_shift($sqlValue);

		echo "<pre>";
		print_r($sqlValue);

		$count = count($datakey);

		$sql = "UPDATE `{$table}` SET ";
		
		$i = 1;
		foreach ($sqlValue as $key => $value) {
			if ($count == $i){
				$sql .= " `{$key}` = '{$value}' ";
			}else{
				$sql .= " `{$key}` = '{$value}' ". ",";
			}
			$i++;
		}
		$sql .= " WHERE `id` = {$where}";
		echo $sql;

		$res = $this->conn->query($sql);
		
		if($res){
			header("Location: http://localhost/php/crud/view/index.php");
		}else{
			echo "Can't Update!";
		}		

	}
}
