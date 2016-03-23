$(document).ready(function(){
	
	$.getJSON("anzsic.json", success=function(data)
	{

	    // json alt demo
	    $('#json').jstree({ 'core' : {
	    	'data' : data
	    }});

	});

	

});