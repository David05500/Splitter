<!-- html form -->
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script
		  src="https://code.jquery.com/jquery-3.2.1.js"
		  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		  crossorigin="anonymous">
		</script>
		<!--  Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>

	<body>
		<form id="form" method="post" action="">
			<h2>Please enter names</h2><br>
			<input id="fname" type="text" name="fname" placeholder="First name" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>"> <br>
			<input id="lname" type="text" name="lname" placeholder="Last name" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>"> <br>
			 
			<select id="strength" type="number" name="strength">
				<option value="select">Select strength</option>
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
			<input id="btnADD" type="button"  value="Add">
			<!-- <button><a style="text-decoration: none;" href='register.php'>Create account</a></button> -->
		</form>

		<table id="lisiOfNames" style="width:100%">
		  <tr id="mainRows">
		    <th>First name</th>
		    <th>Last name</th> 
		    <th id="myStrength">Strength</th>
		    <th></th>
		  </tr>
		</table>

		<label>Team 1</label>
		<table id="team1" style="width:100%">
		  <tr>
		    <th>First name</th>
		    <th>Last name</th> 
		    <th>Strength</th>
		    <th></th>
		  </tr>
		</table>

		<button id="btnSplit">Split</button><br>

		<label>Team 2</label>
		<table id="team2" style="width:100%">
		  <tr>
		    <th>First name</th>
		    <th>Last name</th> 
		    <th>Strength</th>
		    <th></th>
		  </tr>
		</table>

		<script  
		src="https://code.jquery.com/jquery-3.2.1.js" 
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
		</script>
		<script type="text/javascript" src="main.js"></script>
	</body>
</html>