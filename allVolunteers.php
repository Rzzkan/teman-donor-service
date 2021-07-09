<?php
    include "connection.php";
	
     $latitude_user = $_POST['latitude'];
    $longitude_user = $_POST['longitude'];
    

    $query = "SELECT v.id, v.name, b.blood_type 'blood', v.rhesus, c.name 'city', v.gender, v.age, v.weight, v.phone, v.total_donor, v.last_donor, v.status_covid, v.symptoms, v.recovery_date, v.user_id FROM volunteers v, cities c, blood_types b WHERE v.bloodtype_id=b.id AND v.city_id=c.id AND v.weight>'45' ORDER BY v.id DESC";
    $result = $connect->query($query);
    $data =[];
    $i=0;


  

	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
              date_default_timezone_set('GMT+7');
                $from = strtotime($row["last_donor"]);
                $today = time();
                $difference = $today - $from;
                $count = floor($difference / 86400);
            if ($count>60) {
                $data[$i] = [
                    'id' => $row["id"],
                    'name' => $row["name"],
                    'blood' => $row["blood"],
                    'rhesus' => $row["rhesus"],
                    'city' => $row["city"],
                    'distance' => distance((double) $latitude_user,(double) $longitude_user,(double) $row["latitude"], (double)$row["longitude"],"K"),
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
                $i = $i + 1;
            }
          
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

     function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
            return $miles;
          }
    }

?>