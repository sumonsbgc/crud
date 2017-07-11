<?php
	include_once '../vendor/autoload.php';
	use App\Query\Query;
	$query = new Query();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if ( isset($_POST['email']) && isset($_POST['pass']) ) {
			if ( !empty($_POST['email']) && !empty($_POST['pass']) ) {
				$query->is_loggedin($_POST);
			}
		}
	}