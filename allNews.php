<?php
    include "connection.php";
	
    $query = "SELECT * FROM announcements ORDER BY id DESC";
    $result = $connect->query($query);
    $data =[];
    $i=0;

	if ($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $data[$i] = [
            'id' => $row["id"],
            'headline' => $row["headline"],
            'description' => htmlentities($row["description"]) ,
            'content' => htmlentities($row["content"]),
            'news_date' => $row["news_date"],
            'path' => $row["path"],
            'filename' => $row["filename"]
            ];
            $i = $i + 1;
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