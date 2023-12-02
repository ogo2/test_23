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