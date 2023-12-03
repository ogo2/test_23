$(document).ready(function(){
	$('.button_all').click(function( event ) {
		var button = $(this).val();
		// Редактирование сообщения
	  	if(button=='edit_message'){
			event.preventDefault();
			var id_message = this.dataset.id;
			var id_textarea = '#message_text'+id_message;
			var message_text = $(id_textarea).val();
			
			var name_user = $('.message_text').attr("data-id");
			var cut_message = '#cut_message'+id_message;
			$.ajax({
					url: '../vender/functions.php',
					method: 'post',
					data: {'message_text': message_text,'button': button, 'name_user': name_user, 'id_message': id_message},
					success: function(data){
						console.log(data);
						$(cut_message).html(message_text);
						$('.message_profile').append(message_text);
						$(id_textarea).val(message_text);
					},
					error: function(){
						console.log('ERROR');
					}
				})
		// Выход с аккаунта
		}if(button=='log_out'){
			$.ajax({
					url: '../vender/functions.php',
					method: 'post',
					data: {'button': button},
					success: function(data){
						location.reload();
					},
					error: function(){
						console.log('ERROR');
					}
				})
		// Добавление комментария
		}if(button=='add_comment'){
			var id_message = this.id;
			var text_comment_area = '#text_comment_'+id_message;
			var user_name = $(text_comment_area).attr("data-id");;
			var text_message = $(text_comment_area).val();
			var id_message_data = $(this).attr("data-id");
			var comm_id = this.dataset.id;
			var collaps = '#comment_list'+comm_id;
			var none_comment = '.none_comment'+comm_id;
			if (text_message.length <=0){
				alert('Ошибка, нельзя оставлять пустой комментарий!')
			}else{
				$.ajax({
						url: '../vender/functions.php',
						method: 'post',
						data: {'button': button, 'user_name': user_name, 'text_message': text_message, 'id_message': id_message_data},
						success: function(data){
							$(collaps).prepend('<div class="collapse show" id="collapseExample_two'+comm_id+'">'+
													'<div class="card card-body">'+
													'<h5>'+user_name+'</h5>'+
													'<p>'+text_message+'</p>'+
													'</div>'+
												'</div>');
							$(text_comment_area).val('')
							$(none_comment).remove();
						},
						error: function(){
							console.log('ERROR');
						}
					})
				}
			}

	})
	
  })