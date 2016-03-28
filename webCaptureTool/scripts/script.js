$(document).ready(function(){



	//Populate the first dropdown
	$.getJSON("first_name.php", success = function(data)
	{
		var options = "";

		for(var i=0; i<Object.keys(data).length; i++)
		{
			//Have the value of the dropdown as the ID while we display the associated text
			options += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
		}


		$("#first_name").append(options);
		$("#first_name").change();	//On page load, simulate a change so that the second dropdown is populated as well

	});

	/*Not being used anymore
	//Populate the date
	var dNow = new Date();
	var utcdate= dNow.getDate() + '/' + (dNow.getMonth()+ 1) + '/' +  dNow.getFullYear();
	$('#date').text(utcdate)*/

	//Check the form
	$('#submit').click(function(){

		
		if (!($('#start_time').val())) {
			alert("Please choose a start time");
			return false;
		}

		if (!($('#end_time').val())) {
			alert("Please choose a end time");
			return false;
		}

		if (!($('#motor').val())) { //add some more checking to make sure number if positive integer later 
			alert("Please choose a motor number");
			return false;
		}

		if (!($('#tyre_ring').val())) {
			alert("Please choose a tyre ring set number");
			return false;
		}

		if (!($('#drive_pulley').val())) {
			alert("Please choose a drive pulley number");
			return false;
		}

		if (!($('#drive_belt').val())) {
			alert("Please choose a drive belt number");
			return false;
		}

		if (!($('#comments').val())) {
			alert("Please add a comment");
			return false;
		}

		if (!($('#fileToUpload').val())) {
			alert("Please add a file");
			return false;
		}
	});


	


});

