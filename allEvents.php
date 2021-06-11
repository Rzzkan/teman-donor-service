<?php
    include "connection.php";
	
    $query = "SELECT * FROM events ORDER BY id DESC";
    $result = $connect->query($query);
    $data =[];
    $i=0;

	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data[$i] = [
            'id' => $row["id"],
            'name' => $row["name"],
            'description' => $row["description"],
            'event_date' => $row["event_date"],
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