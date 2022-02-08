<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>

<body>
<section class="centered-form_request">
  <div class="wrapper_request">
    <section class="form login">
      <header>Заяви</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="div-img1">
        <div class="field img drag-area">
          <div class="div-for_img">Снимка</div> 
        </div>
          </div>
          
        <div class="input-div">
          
      
        <div class="field input"> 
          <textarea name="title" placeholder="Заглавие..." required></textarea>
        </div>
        <div class="field input"> 
          <textarea class="desc-text"  name="description" placeholder="Описание..." required></textarea>
        </div>
        </div>
        </div>
        <p>Качи снимка:  <button class="choose-file">Цъкни ме</button></p>
          <input class="mqu" type="file" hidden multiple>
        <div class="field button">

          <input type="submit" name="submit" value="Влез в акаунта">
        </div>
      </form>
    
    </section>
  </div>
  </section>

    
    <script>
    var active = document.querySelector(".navbtn-3");
    active.classList.add("active");
</script>
<script src="javascript/request-img.js"></script>
<?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
  }
  ?>
</body>