$(document).ready(function(){

	$('#fullpage').fullpage({ 
		navigation:true,
	   anchors:['firstPage', 'secondPage', 'thirdPage', 'fourthPage'],
		scrollBar:true,
		navigationPosition: 'right',
        navigationTooltips: ['Home', 'About', 'Projects', 'Contact'],
        onLeave: function(index, nextIndex, direction){
            
            if(nextIndex === 4){
                $('.button').css('color','#9CC5C9');
            }else{
                $('.button').css('color','#703030');
            }
            if(nextIndex === 3){
                $('.button').css('color','#9CC5C9');
            }         
        
        }
        
    });
	

	var buttons = $('.button');


	buttons.on('click',function(){

		console.log($(this).text());

	});


	for(var i=0;i<buttons.length;i++){

		var button = buttons[i];
		$(button).on('click',function(){

			var buttonText = $(this).text();

			if(buttonText == 'HOME'){
				
				$.fn.fullpage.moveTo(1);
			}else if(buttonText == 'ABOUT'){
				
				$.fn.fullpage.moveTo(2);
			}else if(buttonText == 'PROJECTS'){
				
				$.fn.fullpage.moveTo(3);
			}else if(buttonText == 'CONTACT'){
			
                $.fn.fullpage.moveTo(4);
                }
            
		});
	}


	var height = $(window).height();
	var width = $(window).width();


});

