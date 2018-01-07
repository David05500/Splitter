$(document).ready(function () {

	let btnADD = $('#btnADD');
	let mainForm = $('#mainForm');
	let startForm = $('#startForm');
	let btnSplit = $('#btnSplit');
	let btnDelete = $('.btnDelete');
	let btnStart = $('#btnStart');
	let arrPlayers = [];
	let x = 0;

	btnStart.click(function(){
		//creating new db table
		event.preventDefault();
		let tname = $('#projectName').val();
		$.post("createDB_table.php", {
			tableName: tname,
		})

		startForm[0].reset();
	});

	btnADD.click(function(){
		//getting input values
		if (document.getElementById("team1").rows.length - 1 > 0){
			deleteTeamLists("team1");
			deleteTeamLists("team2");
		}
		let fname = $('#fname').val();
		let lname = $('#lname').val();
		let strength = $('#strength').val();
		//checking input values 
		if ((fname == '') || (lname == '') || (strength == 'select')){
			console.log('please enter your details');
		}else{
			//adding players to an array of objects
			let player = new Object();
			player.first_name = fname;
			player.last_name = lname;
			player.strength = strength;
			arrPlayers[x] = player;
			addToDB(arrPlayers);
			x+=1;
			mainForm[0].reset();

			//adding a new player to the list
			let MainList = document.getElementById('lisiOfNames');
			let row = MainList.insertRow(-1);
		    let cell_fname = row.insertCell(0);
		    let cell_lname = row.insertCell(1);
		    let cell_strength = row.insertCell(2);
		    let cell_delete = row.insertCell(3);
		    cell_fname.innerHTML = fname;
		    cell_lname.innerHTML = lname;
		    cell_strength.innerHTML = strength;
		    cell_delete.innerHTML = '<button class="btnDelete">X</button>';
		}
	});

	btnSplit.click(function(){
		if (($('#team1 tr').length - 1) == 0 ){
			if (($('#lisiOfNames tr').length - 1) % 2 != 0){
				console.log('Please enter another player');
			}else{
				let copyOfAllPlayers = arrPlayers.slice();
				splitInToTeams(copyOfAllPlayers);
			}
		}
	});

	function splitInToTeams(allPlayers){
		let team_1 = [];
		// let team_2 = [];
		let sorting = true;
		let i = 0;
		let count = 1;
		let numPlayersEachTeam = allPlayers.length/2;
		//sorting the array by strength 
		allPlayers.sort(function(a, b){
		    return a.strength-b.strength
		})
		//splitting teams equaly by players strength
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
		let team1Strength = team_1.reduce(function(sum, val){
			return sum + val.strength/1;
		}, 0);
		let team2Strength = allPlayers.reduce(function(sum, val){
			return sum + val.strength/1;
		}, 0);
		team_1.forEach(function(player){
			player.teamNumber = 'team1';
		});
		allPlayers.forEach(function(player){
			player.teamNumber = 'team2';
		});

		allPlayers = allPlayers.concat(team_1);
		editDB(allPlayers);
		splitInToLists(allPlayers);
		console.log("team 1:" + team1Strength);
		console.log("team 2:" + team2Strength);
		return;
	};

	function splitInToLists(listOfPlayers){
	    listOfPlayers.forEach(function(player){
			let list = document.getElementById(player.teamNumber);
			let row = list.insertRow(-1); //add a new row to the end of the list 
		    let cell_fname = row.insertCell(0);
		    let cell_lname = row.insertCell(1);
		    let cell_strength = row.insertCell(2);
		    cell_fname.innerHTML = player.first_name;
		    cell_lname.innerHTML = player.last_name;
		    cell_strength.innerHTML = player.strength;
	    });
	    return;
	}

	function editDB(allPlayers){
		// let name = document.getElementById()
		$.ajax
		 ({
		  type:'UPDATE',
		  url:'updateDB.php',
		  dataType: "json",
		  contentType: "application/json",
		  data:JSON.stringify( {
		   // add_player:'add_player',
		   players: allPlayers
		  }),
		  success:function(response) {
		   if(response.error === true)
		   {
		    console.log(response.error_text);
		   }
		  }
		 });
		return;
	}

	function addToDB(Player){
		// let name = document.getElementById()
		$.ajax
		 ({
		  type:'POST',
		  url:'updateDB.php',
		  dataType: "json",
		  contentType: "application/json",
		  data:JSON.stringify( {
		   // add_player:'add_player',
		   players: Player
		  }),
		  success:function(response) {
		   if(response.error === true)
		   {
		    console.log(response.error_text);
		   }
		  }
		 });
		return;
	}

	function deleteTeamLists(list){
		let table = document.getElementById(list);
		for(i = table.rows.length - 1; i > 0; i--)
		{
			table.deleteRow(i);
		}
		return;
	};
	btnDelete.on("click", event =>{
		console.log('Helllo');
		let par = $(this).parent().parent(); //tr 
		par.remove();
	}); 
});