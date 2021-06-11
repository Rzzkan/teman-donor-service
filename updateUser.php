<?php
	include "connection.php";

	$id = $_POST['id'];
	$name = $_POST['name'];

	
	$query = mysqli_query($connect,"UPDATE users SET name='$name' WHERE id='$id'");
	
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "Update Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Update Data";
		die(json_encode($response)); 
	}	

?>