<?php
	include "connection.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$options = [
        'cost' => 10,
    ];

    $hashed = password_hash($password, PASSWORD_DEFAULT, $options);
	
	$query = mysqli_query($connect,"INSERT INTO users (name,email,password) VALUES('$name','$email','$hashed')");

	//Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "Save Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Save Data";
		die(json_encode($response)); 
	}	

?>