<?php
    include "connection.php";
    $id = $_POST['id'];
	
    $query = "SELECT * FROM announcements WHERE id='$id'";
    $result = $connect->query($query);
    $data =[];

	if ($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
       $data = [
            'id' => $row["id"],
            'headline' => $row["headline"],
            'description' => htmlentities($row["description"]) ,
            'content' => htmlentities($row["content"]),
            'news_date' => $row["news_date"],
            'path' => $row["path"],
            'filename' => $row["filename"]
            ];
        }
        $response->success = 1;
        $response->message = "Get Data Success";
        $response->data = $data;
	    die(json_encode($response));
	}else{ 
		$response->success = 0;
		$response->message = "Data Empty";
		die(json_encode($response)); 
	}	


?>