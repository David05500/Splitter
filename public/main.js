$(document).ready(function () {

	let btnADD = $('#btnADD');
	let form = $('#form');
	let btnSplit = $('#btnSplit');
	let arrUsers = [];
	let users = {
		first_name: '',
		last_name: '',
		strength: ''
	};
	let x = 0;

	btnADD.click(function(){
		//getting input values
		let fname = $('#fname').val();
		let lname = $('#lname').val();
		let strength = $('#strength').val();
		//checking input values 
		if ((fname == '') || (lname == '') || (strength == 'select')){
			console.log('please enter your details');
		}else{
			//adding users to an array of objects
			let user = new Object();
			user.first_name = fname;
			user.last_name = lname;
			user.strength = strength;
			arrUsers[x] = user;
			x+=1;
			//sending the data to the database
			$.post("index_php.php", {
				firstName: fname,
				lastName: lname,
				Strength: strength
			},
			//resetting the inputs
			function(data){
				form[0].reset();
			})
			//adding a new user to the list
			let list = document.getElementById('lisiOfNames');
			let row = list.insertRow(-1);
		    let cell_fname = row.insertCell(0);
		    let cell_lname = row.insertCell(1);
		    let cell_strength = row.insertCell(2);
		    cell_fname.innerHTML = fname;
		    cell_lname.innerHTML = lname;
		    cell_strength.innerHTML = strength;
		}
	});

	btnSplit.click(function(){

		if (($('#lisiOfNames tr').length - 1) % 2 != 0){
			console.log('Please enter another player');
		}else{
			splitInToTeams(arrUsers);
		}

	});

	function splitInToTeams(allPlayers){

		//sorting the array by strength 
		allPlayers.sort(function(a, b){
		    return a.strength-b.strength
		})
		//finding total strength 
		let totalStrength = allPlayers.reduce(function(sum, val){
			return sum + val.strength/1;
		}, 0);

		let team_1 = [];
		let team_2 = [];
		let sorting = true;
		let i = 2;
		let count = 0;
		let numPlayersEachTeam = allPlayers.length/2;
		//adding the first player from main array into team 1
		team_1.splice(0, 1, allPlayers[0]);
		allPlayers.shift();
		console.log(team_1);
		console.log(allPlayers);


		while(sorting){
			if(numPlayersEachTeam != team_1.length){
				team_1.splice(i, 1, allPlayers[i]);
				allPlayers.splice(i, 1);
				count++;
				count % 2 == 0 ? i+=2 : i;
			}else{
				sorting = false;
			}
		}
		console.log(team_1);
		console.log(allPlayers);

		let team1Strength = team_1.reduce(function(sum, val){
			return sum + val.strength/1;
		}, 0);
		let team2Strength = allPlayers.reduce(function(sum, val){
			return sum + val.strength/1;
		}, 0);

		splitInToLists(team_1, 'team1');
		splitInToLists(allPlayers, 'team2');
		console.log("team 1:" + team1Strength);
		console.log("team 2:" + team2Strength);
	};

	function splitInToLists(listOfPlayers, team){
	    listOfPlayers.forEach(function(player){
			let list = document.getElementById(team);
			let row = list.insertRow(-1); //add to the end of the list 
		    let cell_fname = row.insertCell(0);
		    let cell_lname = row.insertCell(1);
		    let cell_strength = row.insertCell(2);
		    cell_fname.innerHTML = player.first_name;
		    cell_lname.innerHTML = player.last_name;
		    cell_strength.innerHTML = player.strength;
	    });
	    return;
	}

});
