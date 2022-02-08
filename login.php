<?php 
  session_start();
  include_once "php/config.php";
  if(isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
<section class="centered-form">
  <div class="wrapper">
    <section class="form login">
      <header>Вход</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Въведи имейл</label>
          <input type="text" name="email" placeholder="Въведи своя имейл" required>
        </div>
        <div class="field input">
          <label>Парола</label>
          <input type="password" name="password" placeholder="Въведи своята парола" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Влез в акаунта">
        </div>
      </form>
      <?php
      if(isset($_GET['page_url'])){ 
        $redirect = $_GET["page_url"];
      }else{}
      ?>
      <div class="link">Нямаш акаунт? <a href="
      <?php
      if(isset($_GET['page_url'])){
      echo "signup.php?page_url=". $redirect;
      }else{
        echo "signup.php";
      } 
      ?>">Регистрирай се!</a></div>
    </section>
  </div>
  </section>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login3.js"></script>



</body>
</html>
