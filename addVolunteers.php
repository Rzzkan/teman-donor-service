<?php
	include "connection.php";

	$name = $_POST['name'];
	$bloodtype_id = $_POST['bloodtype_id'];
	$rhesus = $_POST['rhesus'];
	$city_id = $_POST['city_id'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$weight = $_POST['weight'];
	$phone = $_POST['phone'];
	$total_donor = $_POST['total_donor'];
	$last_donor = $_POST['last_donor'];
	$status_covid = $_POST['status_covid'];
	$symptoms = $_POST['symptoms'];
	$recovery_date = $_POST['recovery_date'];
	$user_id = $_POST['user_id'];
	
	$query = mysqli_query($connect,"INSERT INTO volunteers (name, bloodtype_id, rhesus, city_id, gender, age, weight, phone, total_donor, last_donor, status_covid, symptoms, recovery_date, user_id ) VALUES ('$name', '$bloodtype_id', '$rhesus', '$city_id', '$gender', '$age', '$weight', '$phone', '$total_donor', '$last_donor', '$status_covid', '$symptoms', '$recovery_date', '$user_id')");
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