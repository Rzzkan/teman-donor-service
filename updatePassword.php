<?php
	include "connection.php";

	$id = $_POST['id'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];

	$options = [
        'cost' => 10,
    ];

    $hashed = password_hash($new_password, PASSWORD_DEFAULT, $options);
	
	$query = mysqli_query($connect,"SELECT * FROM users where id='$id'");
    $data =[];

	if ($query->num_rows>0) {
        $row = $query->fetch_assoc();
        if (password_verify($old_password, $row["password"])) {
            $query_pw = mysqli_query($connect,"UPDATE users SET password='$hashed' WHERE id='$id'");
	 		$response->success = 1;
           	$response->message = "Success Update Password";
           	die(json_encode($response)); 
        } else {
           $response->success = 0;
           $response->message = "Sandi Lama Tidak Sesuai";
           die(json_encode($response)); 
        }    
	}
	
 

?>