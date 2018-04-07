$(document).ready(function(){

$("#eye").mousedown(function(){
                $("#passwd").attr('type','text');
            })
			.mouseup(function(){
            	$("#passwd").attr('type','password');
            })
			.mouseout(function(){
            	$("#passwd").attr('type','password');
            });
$("#eye1").mousedown(function(){
                $("#passwd1").attr('type','text');
            })
		.mouseup(function(){
            	$("#passwd1").attr('type','password');
            })
		.mouseout(function(){
            	$("#passwd1").attr('type','password');
          });
			
});