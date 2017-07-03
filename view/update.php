<?php
	include_once "../vendor/autoload.php";
	use App\Query\Query;
	$query = new Query();


//	$query->update();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['submit'])) {
		if ( !empty($_POST['email']) && !empty($_POST['pass']) ) {
			//var_dump($_POST);
			$query->update($_POST);
		}
	}
}