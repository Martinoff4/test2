<?php 
  session_start();
  include_once "php/config.php";

include_once "header.php"; 
?>


<body>
 
<div class="landing">
<hr style="border: 1px solid #fff;">
<div class="home-container">
  <div class="home-grid-item gr-item1" style="margin-left: auto; margin-right: auto;"><div class="btns">
  <button class="home_buttons"><a href="missions.php">Започни мисия</a></button>
<button class="home_buttons"><a href="request.php">Направи мисия</a></button>
</div>
  </div>
  <div class="home-grid-item gr-item2"><img src="./img_main/home-logo1.svg" alt="home-logo"></div>
  <div class="home-grid-item gr-item1" style="margin-right: auto; margin-left: auto;"><div class="btns">
  <button class="home_buttons"><a href="missions.php">ㅤЗа проектаㅤ</a></button>
<button class="home_buttons"><a href="request.php">За нас</a></button>
</div>
  </div>
  </div>
  <div class="important_text">
<p>Бъди герой, дори да <br> нямаш супер сили!</p>
</div>
</div>
<a href="users.php" class="scrolltotop sm-scroll bg-main"><i class="fas fa-envelope"></i></a>
<?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
  }
  ?>
  <script>
    var active = document.querySelector(".navbtn-1");
    active.classList.add("active");
</script>
</body>
</html>