$(document).ready(function(){

	//Populate the first dropdown
	$.getJSON("first_dropdown.php", success = function(data)
	{

		if(data.length)
			alert("success");

		var options = "";

		for(var i=0; i<data.length; i++)
		{
			//Have the value of the dropdown as the ID while we display the associated text
			options += "<option value='" + data[i][0].toLowerCase() + "'>" + data[i][1] + "</option>";
		}


		$("#slctCat").append(options);
		$("#slctCat").change();	//On page load, simulate a change so that the second dropdown is populated as well

	});

	//Populate the second dropdown whenever the first changes
	$("#slctCat").change(function()
	{

		//On changing the dropdown, change the paragraph to reflect the current dropdown value
		$("#test_paragraph_1").html("The equipment category corresponds to ID " + $(this).val() + ".");

		$.getJSON("second_dropdown.php?cat=" + $(this).val(), success = function(data)
		{

			var options = "";

			for(var i=0; i<data.length; i++)
			{
				//Have the value of the dropdown as the ID while we display the associated text
				options += "<option value='" + data[i][0].toLowerCase() + "'>" + data[i][1] + "</option>";
			}

			$("#slctClass").html(""); //On each new load, start with an empty list to prevent the various options from previous calls to just keep stacking
			$("#slctClass").append(options);
			$("#slctClass").change();	//On page load, simulate a change so that the second paragraph

		});

	});

	$("#slctClass").change(function()
	{
		//On changing the dropdown, change the paragraph to reflect the current dropdown value	
		$("#test_paragraph_2").html("The class category corresponds to ID " + $(this).val() + ".");

	});


});

