<?php
	include_once '../vendor/autoload.php';
	use App\Query\Query;
	$query = new Query();
	if (isset($_GET)) {
		if (!empty($_GET)) {
			$where[] = $_GET;			
		}
	}
	$data = $query->selectBywhere($_GET);
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
			<div class="col-lg-6 offset-lg-3">
				<form action="update.php" class="padding" method="post">
					<div class="form-group">
						<label for="fname">First Name</label>
						<input name="fname" type="text" class="form-control" id="fname" value="<?php echo $data->fname; ?>">
					</div>
					<div class="form-group">
						<label for="lname">Last Name</label>
						<input name="lname" type="text" class="form-control" id="lname" value="<?php echo $data->lname; ?>">
					</div>
					<div class="form-group">
						<label for="email">Your Email</label>
						<input name="email" type="email" class="form-control" id="email" value="<?php echo $data->email; ?>">
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input name="pass" type="password" class="form-control" id="password" value="<?php echo $data->pass; ?>">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit">
					</div>										
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src=../"assets/css/bootstrap.min.js"></script>
</body>
</html>