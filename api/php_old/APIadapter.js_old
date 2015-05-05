function APICall(httpINP,commandInp, parameters, readyFunction){
	  
	  
	  var ajaxSuccsessHandling = function( data ) {   
  			try {
  				//console.log('Parsing Json..');
	  			//var parsedData = $.parseJSON(data);  
	  			// war vorher mal. habe das php dokument in json header umgewandelt..		
	  			var parsedData = data;
	  			try {
	  				console.log('Transfer OK...');
	  				//console.log(data);
			  		if (!parsedData.globalApiError) {
			  			console.log('No globalApiError detected...');
			  			// weiter gehts mit warnungen aufsplitten
			  			if (parsedData.warnings.length <= 0){
			  				console.log('No warnings accured (this is considered as goood.)!');
			  			} else {
				  			console.log('Listing Warnings:');
				  			for (var warn in parsedData.warnings) {
					  			console.log('Warning #'+warn+' '+parsedData.warnings[warn]);
					  		}	
					  		console.log('-------------------------');
			  			}
				  		// resdata ausgeben
				  		readyFunction(parsedData.RESdata);
	  				} else {  		
			  			console.log('API INTERNAL Error:');
			  			// vereinbarung, das die variable globalApiError
			  			// interne exceptions in der API wiedergibt.
			  			console.log(parsedData.globalApiError);
			  	   	}
	  			} catch(err) {
			  	    console.log('CLIENTSIDE JS Error:');
					console.log(data); 	  	
  				}
	  		} catch(err) {
			  	console.log('API PARSE error:');
				console.log(data); 	  	
			}				  			
	    };
	    
	    // var ajaxErrorhandling = function(qXHR, textStatus, errorThrown) {
		  // alert(errorThrown);
		// } ; 
// 		
		var APIURL = 'php/BandAPI.php';
		// Simple GET request example :
		httpINP({method:'POST',
				url:APIURL,
				data:{
		        	command: commandInp,
		        	params : parameters
		        }        
	         	,headers: {'Content-Type': 'application/json'}
	         })
		  .success(function(data, status, headers, config) {
		    
		    // this callback will be called asynchronously
		    // when the response is available
		    ajaxSuccsessHandling(data);
		    
		  })
		  .error(function(data, status, headers, config) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    console.log('ERROR');
		    
		  })
		;
	  
	  // das ist die alte struktur...
	  // *hach* *nostalgieee*	  
	  // $.ajax({
        	// type: 'post',
        	// //dataType: "json", // unsicher, da behandel ich lieber selber...
        	// // sonst gibt php warnings aus, das wird dann immer mit einer 
        	// // parsermeldung < unexpected token quittiert. behandlung der datein weiter unten
	        // url: 'php/BandAPI.php',
	        // data: {
	        	// command: commandInp,
	        	// params : parameters
	        // },
	        // success:  ajaxSuccsessHandling,     
	        // error: ajaxErrorhandling  
	    // });	
// 	    
}