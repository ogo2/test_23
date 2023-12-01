$(document).ready(function(){
	let arr = [];

	$('#edit_message').on('click', function( event ) {
		
		event.preventDefault();
		var message_text = $('#message_text').val();

		$.ajax({
	        url: '../vender/functions.php',
	        method: 'post',
	        data: {'message_text': message_text},
	        success: function(data){
	            console.log(data);
	        },
	        error: function(){
	            console.log('ERROR');
	        }
    	})
	})
})