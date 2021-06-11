<?php
    include "connection.php";
    $id = $_POST['id'];
    
    $query = "SELECT v.id, v.name, b.blood_type 'blood', v.rhesus, c.name 'city', v.gender, v.age, v.weight, v.phone, v.total_donor, v.last_donor, v.status_covid, v.symptoms, v.recovery_date, v.user_id FROM volunteers v, cities c, blood_types b WHERE v.bloodtype_id=b.id AND v.city_id=c.id AND v.id='$id'";
    $result = $connect->query($query);
    $data =[];

    if ($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
       $data = [
            'id' => $row["id"],
            'name' => $row["name"],
            'blood' => $row["blood"],
            'rhesus' => $row["rhesus"],
            'city' => $row["city"],
            'gender' => $row["gender"],
            'age' => $row["age"],
            'weight' => $row["weight"],
            'phone' => $row["phone"],
            'total_donor' => $row["total_donor"],
            'last_donor' => $row["last_donor"],
            'status_covid' => $row["status_covid"],
            'symptomps' => $row["symptomps"],
            'recovery_date' => $row["recovery_date"],
            'user_id' => $row["user_id"]
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