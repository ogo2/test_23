<?php
	session_start();
  if(!$_SESSION['name_user']){
    header('Location: "index.php"');

  }else{
    include('vender/connect.php');
    include('vender/functions.php');
  }
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <script src="assets/jquery.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовое задание</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <header>
      <div class='container'>
      <div class="container text-center">
        <div class="row">
            <div class="col">
              <a class="nav-link fs-2" href='log_out.php'>Выход</a>
            </div>
            <div class="col">
            <a class="nav-link disabled fs-2" aria-current="page" href='profile.php'>Мои сообщения</a>
            </div>
            <div class="col">
            <a class="nav-link fs-2" href='list_message.php'>Все сообщения</a>
            </div>
          </div>
      </div>
      </div>
    </header>
  <section >
    <div class='container'>
      <h1><?php echo $_SESSION['name_user']; ?></h1>
      <h3>Мои сообщения</h3>
      <div class="container text-center">
        <div class="row">
          <?php select_message($_SESSION['name_user'], $conn); ?>
        <div>
      </div>
    </div>
</section>
    <script src='assets/assets.js'>
      
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>