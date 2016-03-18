$(document).ready(function(){

	$("#test_paragraph_2").html("back");	

		//Populate the first dropdown
		$.getJSON("first_dropdown.php", success=function(data)
		{
			/*if (data) {
			  alert('Result');
			} else {
			  alert('Empty');
			}*/

			var options = "";

			for(var i=0; i<Object.keys(data).length; i++)
			{
				//Have the value of the dropdown as the ID while we display the associated text
				options += "<option value='" + data[i].ID + "'>" + data[i].Description + "</option>";
			}


			$("#slctCat").append(options);
			$("#slctCat").change();	//On page load, simulate a change so that the second dropdown is populated as well


			
	

	});

	$("#slctCat").change(function()
	{
		$("#test_paragraph_2").html($(this).val());	

	});
});

