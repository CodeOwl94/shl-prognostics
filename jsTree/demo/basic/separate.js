$(document).ready(function(){
	
	//Get the data from the JSON file and create the tree based on that
	$.getJSON("anzsic.json", success=function(data)
	{
	    // json alt demo
	    $('#json').jstree({ 'core' : {
	    	'data' : data
	    }});

	});

	//Respond to clicks
	$("#json").bind(
		"select_node.jstree", function(evt, data){
			
            //Check if the selected node is a parent node or a leaf node
            if ($('#json').jstree(true).is_parent(data.node)) 
            {
            	$('#status').text("Please select a leaf node");
            } else
            {
            	$('#status').text(data.node.text);
            };
        }
        );

	

});