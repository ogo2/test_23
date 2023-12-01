<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовое задание</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class='container'>
    	<h1>Добавить сообщение</h1>
    	<form method="post" action='vender/functions.php'>
        <div class="mb-3">
          <label class="form-label">Заголовок</label>
          <input required type="text" name='name_users'class="form-control" >
        </div>
        <div class="mb-3">
          <label class="form-label">Сообщение</label>
          <input required type="textarea" name='text_message' class="form-control">
        </div>
       
        <button type="submit" class="btn btn-primary">Добавить</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>