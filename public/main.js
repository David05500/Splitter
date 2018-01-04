$(document).ready(function () {

	let btnADD = $('#btnADD');
	let form = $('#form');

	btnADD.click(function(){

		//getting input values
		let fname = $('#fname').val();
		let lname = $('#lname').val();
		let strength = $('#strength').val();

		//checking input values 
		if ((fname == '') || (lname == '') || (strength == 'select')){
			console.log('please enter your details');
		}else{

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

			//adding a new row to the list
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
});
