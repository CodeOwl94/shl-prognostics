$(document).ready(function(){
alert("here");
	//Populate the first dropdown
	$.getJSON("first_dropdown.php", success = function(data)
	{
		alert("here");
		//if(data.length)
		//	alert("success");

		var options = "";

		for(var i=0; i<Object.keys(data).length; i++)
		{
			//Have the value of the dropdown as the ID while we display the associated text
			options += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
		}


		$("#slctCat").append(options);
		$("#slctCat").change();	//On page load, simulate a change so that the second dropdown is populated as well

	});


});

