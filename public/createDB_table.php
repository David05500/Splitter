<?php 
include 'dbConnection.php'; //connecting to database

$tname = $_POST['tableName'];
//cleaning user input to prevent SQL injection
$clean_tname = mysqli_real_escape_string($mysql_connection, $tname);
echo $clean_tname;

// creating a query to add table to the database
$query = "CREATE TABLE `$clean_tname` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `firstName` varchar(255) NOT NULL,
 `lastName` varchar(255) NOT NULL,
 `strength` varchar(255) NOT NULL,
 `team_number` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
AUTO_INCREMENT=1;";
$result = mysqli_query($mysql_connection, $query);

// if ($result){
// 	// chekcing if query ran okay
// 	if (mysqli_affected_rows($mysql_connection) > 0){
// 		// checking if we managed to update a row of data
// 	}else{

// 	}
?>