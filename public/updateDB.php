<?php
header('Content-Type: application/json');
include 'dbConnection.php'; //connecting to database

switch($_SERVER['REQUEST_METHOD']){
	case "POST":
		$players = file_get_contents("php://input");
		$ar = json_decode($players, true);
		end($ar["players"]);//pointing to the last element in anarray
		$i = key($ar["players"]);
		$firstName = $ar["players"][$i]["first_name"];
		$lastName = $ar["players"][$i]["last_name"];
		$strength = $ar["players"][$i]["strength"];

		$query = "INSERT INTO playersDetails (firstName, lastName, strength) VALUES ('$firstName', '$lastName', '$strength');";
		$result = mysqli_query($mysql_connection, $query);
		if ($result) {
			echo json_encode(array("error" => false, "error_text" => "No Error"));
		}
		
	break;

	case "GET":
	break;

	case "PUT":
	break;

	case "UPDATE":
		$players = file_get_contents("php://input");
		$arr = json_decode($players, true);
		$arrSize = sizeof($arr['players']);
		for ($i=0; $i <= $arrSize -1; $i++){
			$firstName = $arr["players"][$i]["first_name"];
			$lastName = $arr["players"][$i]["last_name"];
			$teamNumber =$arr["players"][$i]["teamNumber"];

			$query = "UPDATE playersDetails SET team_number = '$teamNumber' WHERE firstName = '$firstName' AND lastName = '$lastName';";
			$result = mysqli_query($mysql_connection, $query);
			if (!$result) {
		    }
		}
	break;

	case "DELETE":
	break;
}
exit();
?>