<?php
include 'dbConnection.php'; //connecting to database

$hoop = "SELECT `strength` FROM `playersDetails` WHERE `firstName` = 'jh'";
$queryf = "SELECT `id`, `firstName`, `lastName`, `strength` FROM `playersDetails`";
$query = "SELECT * FROM `playersDetails` ORDER BY `strength`";
$result = mysqli_query($mysql_connection, $query);
$array = mysqli_fetch_row($result);
// var_dump($array);
return $array;
?>

<!-- if (mysqli_num_rows($result) > 0){
	// while ($row = mysqli_fetch_row($result)){
	// 	echo "<p>";
	// 	echo $row['firstName'];
	// 	echo "<br>";
	// 	echo $row['lastName'];
	// 	echo "</p>";
	// }
	var_dump($array);
	echo "string";
} else {

	echo "There are no results";

} -->