<?php

include('ApiClass.php');

$api = new Api();

if ($_GET["action"] == 'fetchAll') {
	$data = $api->fetchAllPersons();
}

if ($_GET["action"] == 'insert') {
	$data = $api->insert();
}

if ($_GET["action"] == 'fetch') {
	$data = $api->fetch($_GET["id"]);
}

// if($_GET["action"] == 'update')
// {
// 	$data = $api->update();
// }

if ($_GET["action"] == 'delete') {
	$data = $api->delete($_GET["id"]);
}

echo json_encode($data);