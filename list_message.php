<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовое задание</title>
    <script src="assets/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class='container'>
      <h1>Сообщения пользователей</h1>
      <div class="container text-center">
      <div class="row">
        <div class="col">
        	<div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Title</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Автор</h6>
              <p class="card-text">Краткое содержание</p>
              <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Читать полностью
                </a>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                  Некоторый заполнитель для компонента сворачивания. Эта панель по умолчанию скрыта, но открывается, когда пользователь активирует соответствующий триггер.
                </div>
              </div>
              <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Комментарии
                </a>
              </p>
              <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                  <h5>Имя пользователя</h5>
                  <p>Текси комментария</p>
                </div>
              </div>
              <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                  <input type="text" name='name_users' class="form-control"">
                  <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script src="assets/assets.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>