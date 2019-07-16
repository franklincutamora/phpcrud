<?php 
if (isset($_POST["action"])) {
    if ($_POST["action"] == 'insert') {
        $form_data = array(
            'firstname' => $_POST["firstname"],
            'lastname' => $_POST["lastname"],
            'email' => $_POST["email"],
            'gender' => $_POST["gender"],
            'age' => $_POST["age"]
        );
        $api_url = "http://localhost/phpcrud/api/api.php?action=insert"; 
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);

        $result = json_decode($response, true);
		foreach ($result as $keys => $values) {
			if ($result[$keys]['success'] == '1') {
				echo 'insert';
			} else {
				echo 'error';
			}
		}
    }

    if($_POST["action"] == 'fetch') {
		$id = $_POST["id"];
		$api_url = "http://localhost/phpcrud/api/api.php?action=fetch&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
		echo $response;
    }
    
    if($_POST["action"] == 'update') {
		$form_data = array(
            'firstname' => $_POST["firstname"],
            'lastname' => $_POST["lastname"],
            'email' => $_POST["email"],
            'gender' => $_POST["gender"],
            'age' => $_POST["age"],
            'id' =>	$_POST['hiddenId']
        );
		$api_url = "http://localhost/phpcrud/api/api.php?action=update";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);

        $result = json_decode($response, true);
		foreach ($result as $keys => $values) {
			if ($result[$keys]['success'] == '1') {
				echo 'update';
			} else {
				echo 'error';
			}
		}
	}
    
    if($_POST["action"] == 'delete') {
        $id = $_POST['id'];
        $api_url = "http://localhost/phpcrud/api/api.php?action=delete&id=".$id."";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
        echo $response;
    }
}