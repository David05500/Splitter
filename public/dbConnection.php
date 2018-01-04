<?php
// create a database connection
$server = "localhost";
$username = "root";
$password = "root";
$database = "splitter";

// Create connection
$mysql_connection = new mysqli($server, $username, $password, $database);

// Check connection
if ($mysql_connection->connect_error) {
    die("Connection failed: " . $mysql_connection->connect_error);
} 