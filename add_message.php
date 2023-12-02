<?php
	session_start();
  if(!$_SESSION['name_user']){
    header('Location: index.php');

  }else{
    include('vender/connect.php');
    include('vender/functions.php');
  }
  include('vender/header.php');
?>

    <div class='container'>
    	<h1>Добавить сообщение</h1>
    	<form method="post" action='vender/functions.php'>
        <div class="mb-3">
          <label class="form-label">Заголовок</label>
          <input required type="text" name='title_message'class="form-control" >
        </div>
        <div class="mb-3">
          <label class="form-label">Сообщение</label>
          <textarea required type="textarea" name='text_message' class="form-control"></textarea>
        </div>
       
        <button type="submit" name='button' value='add_message_button' class="btn btn-primary">Добавить</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>