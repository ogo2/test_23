<?php
	require_once('connect.php');
	session_start();

	function login(){
		$_SESSION['name_user'] = $_POST['name_user'];
		header('Location: ../profile.php');
	}

	function select_message($name_user, $conn){
		$name_user=$_SESSION['name_user'];
		$sql = "SELECT * FROM message WHERE user='$name_user'";
		if($result = $conn->query($sql)){
			if($result->num_rows > 0){
				foreach($result as $row){
					$username = $row["user"];
					$message_text = $row["message_text"];
					$id_message = $row['id'];
					$title = $row["title"];
					echo '<div class="col">
						<div class="card" style="width: 18rem;;">
						<div class="card-body">
							<h5 class="card-title">'.$title.'</h5>
							<h6 id="name_user_edit" class="card-subtitle mb-2 text-body-secondary">'.$username.'</h6>
							<p class="card-text">Краткое содержание</p>
							<p>
							<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample'.$id_message.'" role="button" aria-expanded="false" aria-controls="collapseExample">
								Читать полностью
							</a>
							</p>
							<div class="collapse" id="collapseExample'.$id_message.'">
							
								<div class="card card-body">
									<textarea data-id="'.$username.'" class="message_profile" id="message_text" >'.$message_text.'
									</textarea>
								</div>
								<button id="button" data-id="'.$id_message.'" value="edit_message" name="button" class="btn btn-primary">Редактировать</button>
							
							</div>
							<p>
							<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample2'.$id_message.'" role="button" aria-expanded="false" aria-controls="collapseExample">
								Комментарии
							</a>
							</p>
							<div class="collapse" id="collapseExample2'.$id_message.'">
							<div class="card card-body">
								<h5>Имя пользователя</h5>
								<p>Текси комментария</p>
							</div>
							</div>
							</div>
							</div>
						</div>';
				}
			}
			else{
				echo "Нет сообщений!!!";
			}
	}
}

	function update_message($conn){
		$name_user=$_POST['name_user'];
		$id_message = $_POST['id_message'];
		$message_text = $conn->real_escape_string($_POST['message_text']);
		$sql = "UPDATE message SET message_text='$message_text' WHERE id=$id_message";

		if($conn->query($sql)){
			echo "Данные успешно добавлены";
		} else{
			echo $sql;
			echo "Ошибка: " . $conn->error;
		}
	}
	
	if(isset($_POST['button'])){
		$but = $_POST['button'];
		if ($but == 'login_user_but'){
			login();
		}if ($but == 'edit_message'){
			update_message($conn);
		}
	}
?>