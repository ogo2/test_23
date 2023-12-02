<?php
	require_once('connect.php');
	session_start();

	function login(){
		$_SESSION['name_user'] = $_POST['name_user'];
		header('Location: ../profile.php');
	}
	function add_message($conn){
		$name_user=$_SESSION['name_user'];
		$title_message = $conn->real_escape_string($_POST['title_message']);
		$message_text = $conn->real_escape_string($_POST['text_message']);
		$sql = "INSERT INTO message (user, message_text, title) VALUES ('$name_user', '$message_text', '$title_message')";

		if($conn->query($sql)){
			echo "Данные успешно добавлены";
			header('Location: ../list_message.php');
		} else{
			echo $sql;
			echo "Ошибка: " . $conn->error;
		}
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
						<div class="card" ">
						<div class="card-body">
							<h5 class="card-title">'.$title.'</h5>
							<h6 id="name_user_edit" class="card-subtitle mb-2 text-body-secondary">'.$username.'</h6>
							<p class="card-text text-truncate" id="cut_message'.$id_message.'">'.$row["message_text"].'</p>
							<p>
							<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample'.$id_message.'" role="button" aria-expanded="false" aria-controls="collapseExample">
								Читать полностью
							</a>
							</p>
							<div class="collapse" id="collapseExample'.$id_message.'">
							
								<div class="card card-body">
									<textarea data-id="'.$username.'" class="message_profile message_text" id="message_text'.$id_message.'" >'.$message_text.'
									</textarea>
								</div>
								<button id="button" data-id="'.$id_message.'" value="edit_message" name="button" class="btn btn-primary button_all">Редактировать</button>
							
							</div>
							<p>
							<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample_two'.$id_message.'" role="button" aria-expanded="false" aria-controls="collapseExample">
								Комментарии
							</a>
							</p>';
					$sql = "SELECT * FROM comment WHERE id_message='$id_message'";
					if($result = $conn->query($sql)){
						if($result->num_rows > 0){
							foreach($result as $comm){
								echo '<div class="collapse" id="collapseExample_two'.$row["id"].'">
										<div class="card card-body">
										<h5>'.$comm['user_name'].'</h5>
										<p>'.$comm['text_comm'].'</p>
										</div>
									</div>';
							}
						}else{
							echo '<div class="collapse" id="collapseExample_two'.$row["id"].'">
										<div class="card card-body">
										<h5>Нет комментариев</h5>
										</div>
									</div>';
						}
					}
							echo '
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
	function all_message($conn){
		$sql = "SELECT * FROM message";
		if($result = $conn->query($sql)){
			if($result->num_rows > 0){
				foreach($result as $row){
					$id = $row['id'];
					echo '<div class="col">
							<div class="card" >
								<div class="card-body" id="card-body'.$row["id"].'">
									<h5 class="card-title">Title</h5>
									<h6 class="card-subtitle mb-2 text-body-secondary">'.$row["user"].'</h6>
									<p class="card-text text-truncate">'.$row["message_text"].'</p>
									<p>
										<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample'.$row["id"].'" role="button" aria-expanded="false" aria-controls="collapseExample">
										Читать полностью
										</a>
									</p>
									<div class="collapse" id="collapseExample'.$row["id"].'">
										<div class="card card-body">
										'.$row["message_text"].'
										</div>
									</div>
									<p>
										<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample_two'.$row["id"].'" role="button" aria-expanded="false" aria-controls="collapseExample">
										Комментарии
										</a>
									</p><div class="comment_list" id="comment_list'.$id.'">';
					$sql = "SELECT * FROM comment WHERE id_message='$id'";
					if($result = $conn->query($sql)){
						if($result->num_rows > 0){
							foreach($result as $comm){
								echo '<div class="collapse" id="collapseExample_two'.$row["id"].'">
										<div class="card card-body">
										<h5>'.$comm['user_name'].'</h5>
										<p>'.$comm['text_comm'].'</p>
										</div>
									</div>';
							}
						}else{
							echo '<div class="collapse none_comment'.$row["id"].'" id="collapseExample_two'.$row["id"].'">
										<div class="card card-body">
										<h5>Нет комментариев</h5>
										</div>
									</div>';
						}
					}
							echo '</div><div class="collapse" id="collapseExample_two'.$row["id"].'">
										<div class="card card-body">
										<textarea data-id="'.$_SESSION['name_user'].'" id="text_comment_button'.$row["id"].'" class="form-control""></textarea>
										<button type="submit" data-id="'.$row["id"].'" id="button'.$row["id"].'" value="add_comment" class="btn btn-primary button_all">Добавить комментарий</button>
										</div>
									</div>
								</div>
							</div>
						</div>';
				}
			}else{
				echo "Нет сообщений!!!";
			}
		}
	}
	function add_comment($conn){
		$user_name=$conn->real_escape_string($_POST['user_name']);
		$id_message = $conn->real_escape_string($_POST['id_message']);
		$text_message = $conn->real_escape_string($_POST['text_message']);
		$sql = "INSERT INTO comment (user_name, text_comm, id_message) VALUES ('$user_name', '$text_message', $id_message)";

		if($conn->query($sql)){
			echo "Данные успешно добавлены";
		} else{
			echo $sql;
			echo "Ошибка: " . $conn->error;
		}
	}
	function log_out(){
		unset($_SESSION['name_user']);
		header('Location: ../index.php');
	}
	if(isset($_POST['button'])){
		$but = $_POST['button'];
		if ($but == 'login_user_but'){
			login();
		}if ($but == 'edit_message'){
			update_message($conn);
		}if ($but == 'log_out'){
			log_out();
		}if ($but == 'add_comment'){
			add_comment($conn);
		}if ($but == 'add_message_button'){
			add_message($conn);
		}
	}
?>