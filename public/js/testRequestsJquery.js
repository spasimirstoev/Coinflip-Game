
	$('#start_btn').on('click', function() {

			for (var i = 0; i < 20000; i++) {
		
		(function(i) {



			var request = $.ajax({
				type: "POST",
				url: "https://boobnbut.kinguin.pro/coinflip",
				data: {
	    			"heads": 1,
	    			"userBetValue" : 1,},
    			dataType: 'json',
    			xhrFields: { withCredentials:true },
    			});

				request.done(function(msg) {
					console.log(msg);
				});

				request.fail(function(error) {
					console.log(error);
				});

			


		})(i);

	}


	});


