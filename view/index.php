<?php  
	include_once '../vendor/autoload.php';
	use App\Query\Query;
	$query = new Query();
	$datalist = $query->selectAll();
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
				<div class="datalist margin0auto">
				<h1 class="text-center">Welcome To CRUD</h1>
				<table class="table table-striped table-bordered table-responsive">
					<thead class="thead-inverse">
						<tr>
							<th>Serial No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
					<?php 
						$sr = 0; 
						foreach($datalist as $data): 
						$sr++;
					?>
						<tr>
							<td><?php echo $sr; ?></td>
							<td><?php echo $data->fname; ?></td>
							<td><?php echo $data->lname; ?></td>
							<td><?php echo $data->email; ?></td>
							<td><?php echo $data->pass; ?></td>
							<td>
								<a href="edit.php?id=<?php echo $data->id; ?>" class="btn btn-primary">
									Edit
								</a>
									&nbsp&nbsp&nbsp
								<a href="delete.php?id=<?php echo $data->id; ?>" class="btn btn-danger">
									Delete
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src=../"assets/css/bootstrap.min.js"></script>
</body>
</html>