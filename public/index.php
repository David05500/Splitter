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

//set defaults
$error_messages = [];
$error = false;

if($_POST){
	$fname = $_POST['fname'];
	$strength = $_POST['strength'];
	$lname = $_POST['lname'];


	if($fname){
		$clean_fname = mysqli_real_escape_string($mysql_connection, $fname);// checking user email in case if user is trying to hack me through some mad code
	}else{
		$error_messages[] = 'Please provide First name';
		$error = true;
	}

	if($lname){
		$clean_lname = mysqli_real_escape_string($mysql_connection, $lname);// checking user email in case if user is trying to hack me through some mad code
	}else{
		$error_messages[] = 'Please provide Last name';
		$error = true;
	}

	if($strength === 'select'){
		$error_messages[] = 'Please select strength';
		$error = true;
	}

	if($error){
		// there was a problem, don't continue
	}else{

		// creating an account in the database
		$query = "INSERT INTO playersDetails (firstName, lastName, strength) VALUES ('$clean_fname', '$clean_lname', $strength);";
		$result = mysqli_query($mysql_connection, $query);// this line actually writes the data in a database table
	}
}

//outputing errors 
if ($error){ ?>
    <div style="color:red;">
        <h2>There were some problems</h2>


        <?php 
        foreach($error_messages AS $error_message){
            echo $error_message.'<br>';
        } ?>
    </div>
<?php }
?>

<!-- html form -->
<form method="post" action="">
	<h2>Please enter names</h2><br>
	First name: <input type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>"> <br>
	Last name: <input type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>"> <br>
	Strength: 
	<select type="number" name="strength">
		<option value="select">Select</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	</select> <br>
	<button>ADDD</button>
	<input type="submit" value="Add">
	<button><a style="text-decoration: none;" href='register.php'>Create account</a></button>

</form>