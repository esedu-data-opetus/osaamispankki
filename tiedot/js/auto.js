/**
 * Site : http:www.smarttutorials.net
 * @author muni
 */
$('#country_name').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'hakua.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'country'
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0      	
		      });
$('#country_name2').autocomplete({
	source: function( request, response ) {
		$.ajax({
		      			url : 'hakua.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'ohjaaja'
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0      	
		      });
		      
		      
		    
		      
		      
		      
		      
			  
				
					
					
					
					
					
					
			    