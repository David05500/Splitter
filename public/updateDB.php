<?php
header('Content-Type: application/json');
include 'dbConnection.php'; //connecting to database

switch($_SERVER['REQUEST_METHOD']){
	case "POST":
		$players = file_get_contents("php://input");//getting data that was passed through url
		$arr = json_decode($players, true);//decoding this data from json format
		end($arr["players"]);//pointing to the last element in anarray
		$i = key($arr["players"]);//getting index of the last element
		$firstName = $arr["players"][$i]["first_name"];//copying required information from the decoded array
		$lastName = $arr["players"][$i]["last_name"];
		$strength = $arr["players"][$i]["strength"];
		//creatig a query
		$query = "INSERT INTO playersDetails (firstName, lastName, strength) VALUES ('$firstName', '$lastName', '$strength');";
		$result = mysqli_query($mysql_connection, $query);//sending the query
		if ($result) {
			echo json_encode(array("error" => false, "error_text" => "No Error"));
		}
	break;
	//unfinished request. Will be used to restore information in the lists 
	case "GET":
		$data = file_get_contents("php://input");
		$arr = json_decode($data, true);
		var_dump($arr);
		// $query = "SELECT * FROM '#arr';";
		// $result = mysqli_query($mysql_connection, $query);

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