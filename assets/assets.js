$(document).ready(function(){
	let arr = [];

	$('#button').click(function( event ) {
	  
	  event.preventDefault();
	  var message_text = $('#message_text').val();
	  var button = $('#button').val();
	  var name_user = $('#message_text').attr("data-id");
	  var id_message = this.dataset.id;
	  console.log(name_user, id_message);
	  $.ajax({
			url: '../vender/functions.php',
			method: 'post',
			data: {'message_text': message_text,'button': button, 'name_user': name_user, 'id_message': id_message},
			success: function(data){
				console.log(data);
				$('.message_profile').append(data['message_text']);
			},
			error: function(){
				console.log('ERROR');
			}
		})
	})
  })