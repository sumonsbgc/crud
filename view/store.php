<?php
include "../vendor/autoload.php";

use App\Query\Query;

$model = new Query();


if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST["submit"])){		

		$fname = strip_tags(htmlentities(trim(stripslashes($_POST["fname"]))));
		$lname = strip_tags(htmlentities(trim(stripslashes($_POST["lname"]))));
		$email = strip_tags(htmlentities(trim(stripslashes($_POST["email"]))));
		$pass = strip_tags(htmlentities(trim(stripslashes($_POST["pass"]))));
		if ( !empty($fname) && !empty($lname) && !empty($email) && !empty($pass) ) {
			echo "Hello I am $fname $lname. My email address is $email and password is $pass";
			//$model->store($_POST);
			$model->insert($_POST);
		}else{
			/*header("Location:index.php");*/
			echo "fail";
		}		
	}else{
		header("Location:index.php");
	}
}
