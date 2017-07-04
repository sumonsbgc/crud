<?php
include_once('../vendor/autoload.php');
use App\Query\Query;
$query = new Query();
if (isset($_GET['id'])) {
	if (!empty($_GET['id'])) {
		$where = $_GET['id'];
	}
}
$data = $query->selectBywhere('model', $where);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div>
					<p>Your First name is :</p>
					<h3><?php echo $data->fname; ?></h3>
				</div>
				<div>
					<p> Your Lirst name is : </p>
					<h3><?php echo $data->lname; ?></h3>
				</div>
				<div>
					<p> Your email is : </p>
					<h3><?php echo $data->email; ?></h3>
				</div>
				<div>
					<p> Your Password is :</p>
					<h3><?php echo $data->pass; ?></h3>
				</div>
			</div>
		</div>
	</div>		
</body>
</html>