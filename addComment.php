<?php
	include "connection.php";

	$username = $_POST['username'];
	$comment = $_POST['comment'];
	$comment_date = $_POST['comment_date'];
	
	$query = mysqli_query($connect,"INSERT INTO comments (username, comment, comment_date) VALUES ('$username', '$comment', '$comment_date')");
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "INSERT Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Update Data";
		die(json_encode($response)); 
	}	

?>