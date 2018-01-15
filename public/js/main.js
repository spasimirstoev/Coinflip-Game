var start = 0;
var head;
var tail;
var headsValue;
var tailsValue;

var balance = $('#showBalance').html();

$(document).ready(function(){  	
 
	//This is for minus & plus btns
	$('#minusBtn').on("click", function(click) {
		currentMinusBetValue = $('#amountBet').val();
		if((currentMinusBetValue -10) < 0){
			return false;
		}
		$('#amountBet').val(currentMinusBetValue - 10);		
	});

	$('#plusBtn').on("click", function(clk) {
		currentBetValue = parseInt($('#amountBet').val());
		if((currentBetValue + 10) > balance){
			return false;
		}
		currentBetValue += 10;
		$('#amountBet').val( currentBetValue);
	});
	// End plus & minus btn
	
	$('#tailsCoin').each(function (){
	    this.style.pointerEvents = 'auto'; 
	}); 
	$('#headsCoin').each(function (){
	    this.style.pointerEvents = 'auto'; 
	}); 

    $('#start_btn').one('click', function() {
        start = 1;
        var userBetValue = $('#amountBet').val();

    	$.ajax({
    		type: "POST", 
    		url: '/coinflip',
    		//Get the value from input and pass it to backend
    		data: {
    			"heads": head,
    			"tails": tail,
    			"userBetValue" : userBetValue
    		},
    		dataType: 'json',
    		success: function(data){
    			console.log(data);
    			console.log(data.error);
    			if(data.error != null){
    				if(!alert(data.error)){window.location.reload();}
    			}else if(data.errorBetValidation != null){
    				if(!alert(data.errorBetValidation)){window.location.reload();}
    			}else{
    				startGame();
        			setTimeout(coinShowBackEnd, 2600);

        			function coinShowBackEnd(){

        				console.log(data.site);
        				if(data.side === 'head'){
        					if(data.result 	=== "win"){
        						console.log(data.result);
        						$(".headImg").fadeIn(2600);
								$(".winImg").fadeIn(2600);
								balance = $('#showBalance').html(data.resultBet);
								console.log(balance);
        					}else{
        						$(".headImg").fadeIn(2600);
        						$(".loseImg").fadeIn(2600);
        						console.log(data.lostBet);
								balance = $('#showBalance').html(data.resultBet);
								console.log(balance);
        					}
		    				
	    				}else {
	    					if(data.result 	=== "win"){
	    						console.log(data.result);
	    						$(".tailImg").fadeIn(2600);
								$(".winImg").fadeIn(2600);
								balance = $('#showBalance').html(data.resultBet);
								console.log(balance);
	    					}else{
	    						$(".tailImg").fadeIn(2600);
								$(".loseImg").fadeIn(2600);
								console.log(data.result);
								balance = $('#showBalance').html(data.resultBet);
								console.log(balance);
	    					}
	    				}
        			}
    			}
    		},
    		error: function(data) {
    			
    		},
	    });
    });

    $('#headsCoin').one('click', function() {
        head = 1;
      
        if(head === 1){
        	$('#tailHide').css('opacity', '0.2');
        	$('#headText').text('Head was chosen');
        	$('#tailsCoin').each(function (){
			    this.style.pointerEvents = 'none'; 
			}); 
			$('#headsCoin').each(function (){
			    this.style.pointerEvents = 'none'; 
			}); 
			$('#tailText').css("display", "none");
			$('#tailHide').addClass("hidden-xs hidden-sm hidden-md");
        }
    });

    $('#tailsCoin').one('click', function() {
        tail = 1;

        if(tail === 1){
    		$('#headHide').css('opacity', '0.2');
    		$('#headsCoin').each(function (){
			    this.style.pointerEvents = 'none'; 
			}); 
    		$('#tailText').text('Tail was chosen');
			$('#tailsCoin').each(function (){
			    this.style.pointerEvents = 'none'; 
			}); 
			$('#headText').css("display", "none");
			$('#headHide').addClass("hidden-xs hidden-sm hidden-md");
        }
    });

    function startGame(e){
    	if (start === 1){
			if (head === 1 || tail === 1){
				$('#start_btn').fadeOut(500);
				$('#animation').show();
				setTimeout(function() {
					$('#animation').fadeOut('fast');
				}, 2600); 
			} 
		} 
    }
});