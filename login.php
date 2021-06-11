<?php
    include "connection.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    // $options = [
    //     'cost' => 10,
    // ];

    // $hashed = password_hash($password, PASSWORD_DEFAULT, $options);

    
    $query = mysqli_query($connect,"SELECT * FROM users where email='$email'");
    $data =[];

	if ($query->num_rows>0) {
        $row = $query->fetch_assoc();
        $data = [
            'id' => $row["id"],
            'name' => $row["name"],
            'email' => $row["email"],
            'name' => $row["name"],
            'password' => $row["password"]
        ];

        if (password_verify($password, $row["password"])) {
            $response->success = 1;
            $response->message = "Get Data Success";
            $response->data = $data;
            die(json_encode($response));
        } else {
            $response->success = 0;
            $response->message = "Data Empty";
            die(json_encode($response)); 
        }    
	}

?>