<!-- html form -->
<!DOCTYPE html>
<html>
	<head>
		<!--  Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="./styles/style.css">
	</head>

	<body id="body">
		<div id="container">
			<header id="header"><img src="./images/Team-Splitter.png"></header>

			<form id="startForm" method="post">

				<input id="projectName" type="text" placeholder=" Enter name of your project" name="">
				<button id="btnStart">Start</button>
				<select id="projects">
					<option value="empty">Choose an existing project</option>
				</select>
				
			</form>
			<div class="lable">
				<label>Enter players names below</label>
			</div>
			<form id="mainForm" method="post" action="">
				<input id="fname" type="text" name="fname" placeholder="First name"> <br>
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
			</form>

			<div class="tables">
				<table id="lisiOfNames">
				  <tr id="mainRows">
				    <th>First name</th>
				    <th>Last name</th> 
				    <th id="myStrength">Strength</th>
				    <!-- <th>Delete a row</th> -->
				  </tr>
				</table>

				<div class="buttonSplit">
					<button id="btnSplit">Split</button>
				</div>
				<div class="teams">
					<table id="team1">
					  <tr>
					    <th>First name</th>
					    <th>Last name</th> 
					    <th>Strength</th>
					  </tr>
					</table>

					<table id="team2">
					  <tr>
					    <th>First name</th>
					    <th>Last name</th> 
					    <th>Strength</th>
					  </tr>
					</table>
				</div>
			</div>
			
			<script  
			src="https://code.jquery.com/jquery-3.2.1.js" 
			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
			</script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
			</script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script>
			<script type="text/javascript" src="main.js"></script>
		</div>
	</body>
</html>