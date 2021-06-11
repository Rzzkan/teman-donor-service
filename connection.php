<?php
    header('Content-Type: application/json');
	error_reporting(0);
	
	$server		= "localhost"; 
	$user		= "u6117788_rzzkan"; 
	$password	= "aditya@321"; 
	$database	= "u6117788_donor"; 
	
	$connect = mysqli_connect($server, $user, $password, $database) or die ("Connection Failed !");

?>