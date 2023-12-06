<?php
	session_start();
  if(isset($_SESSION['name_user'])){
    header('Location: profile.php');
  }else{
    include('vender/connect.php');
    include('vender/functions.php');
  }
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовое задание</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class='container'>
    	<h1>Войдте перед тем как читать сообщения</h1>
    	<form method="post" action='vender/functions.php'>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Имя пользователя</label>
          <input type="text" name='name_user' placeholder="Вася Васильев" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Мы никогда никому не передадим ваши данные.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Пароль</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1">
        </div>
       
        <button type="submit" name='button' value='login_user_but' class="btn btn-primary">Войти</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>