<?php 
include 'dbConnection.php'; //connecting to database

//setting defaults
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$strength = $_POST['Strength'];

//cleaning user input to prevent SQL injection
$clean_fname = mysqli_real_escape_string($mysql_connection, $fname);
$clean_lname = mysqli_real_escape_string($mysql_connection, $lname);

// creating a query to add data to the database
$query = "INSERT INTO playersDetails (firstName, lastName, strength) VALUES ('$clean_fname', '$clean_lname', $strength);";
$result = mysqli_query($mysql_connection, $query);// this line actually writes the data in a database table

// if ($result){
// 	// chekcing if query ran okay
// 	if (mysqli_affected_rows($mysql_connection) > 0){
// 		// checking if we managed to update a row of data
// 	}else{

// 	}
?>