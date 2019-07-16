<?php
$api_url = "http://localhost/phpcrud/api/api.php?action=fetchAll";
$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
$displayResults = '';

if(count($result) > 0) {
	foreach($result as $row) {
		$displayResults .= '
		<tr>
			<td>'.$row->id.'</td>
			<td>'.$row->firstname.' '.$row->lastname.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->gender.'</td>
			<td>'.$row->age.'</td>
			<td>
				<button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button>
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button>
			</td>
		</tr>
		';
	}
} else {
	$displayResults .= '
	<tr>
		<td colspan="6" align="center">No Data Found</td>
	</tr>
	';
}
echo $displayResults;