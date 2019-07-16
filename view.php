<?php
require_once('database.php');
$res = $database->read();

$api_url = "http://localhost/phpcrud/api/api.php?action=fetch";
$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
$output = '';

if(count($result) > 0) {
	foreach($result as $row) {
		$output .= '
		<tr>
			<td>'.$row->id.'</td>
			<td>'.$row->firstname.'</td>
			<td>'.$row->lastname.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->gender.'</td>
			<td>
				<button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button>
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button>
			</td>
		</tr>
		';
	}
} else {
	$output .= '
	<tr>
		<td colspan="6" align="center">No Data Found</td>
	</tr>
	';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in PHP & MySQL - Read</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>E-Mail</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Extras</th>
			</tr>
			<?php 
			// while($r = mysqli_fetch_assoc($res)){
				echo $output;
			?>
			<!-- <tr>
				<td><?php //echo $r['id']; ?></td>
				<td><?php //echo $r['firstname'] . " " . $r['lastname']; ?></td>
				<td><?php //echo $r['email']; ?></td>
				<td><?php //echo $r['gender']; ?></td>
				<td><?php //echo $r['age']; ?></td>
				<td><a href="update.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="delete.php?id=<?php //echo $r['id']; ?>">Delete</a></td>
			</tr> -->
			<?php //} ?>
		</table>
	</div>
</div>
</body>
</html>