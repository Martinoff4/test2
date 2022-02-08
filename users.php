<?php 
  session_start();
  include_once "php/config.php";
  include_once "php/protocol.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php?page_url=". $redirect_link_var );
  }
?>
<?php include_once "header.php"; 
?>
<body>

<section>
<div class="combining_divs">
  <div class="wrapper_users ">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);            
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span> 
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Изход</a>
      </header>
      <div class="search">
        <span class="text">Избери потребител за да почнеш чат</span>
        <input type="text" placeholder="Потърси потребител...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  
  
  </div>
  <div class="wrapper_chat removing_tag">
    <section class="chat-area">
      <header>
        
        <a class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <div class="details">
          <span></span>      
        </div>
        <div class="stars-feedback">
        <label style="opacity: 0.7;" for="star-feedback" id="button1" class="star-feedback fas fa-star"></label>
        </div>
        <input type="checkbox" name="rate" id="star-feedback">
      </header>
      <div class="chat-box">
      <div class="text">Няма избран потребител.</div>
        </div>
      
      <form action="#" class="typing-area" autocomplete ="off">
        <input type="text" name="ougoing_id" value=""  hidden>
        <input type="text" class="incoming_id" name="incoming_id" value="" hidden>
        <input style="opacity: 0.7;" type="text" name="message" class="input-field" placeholder="Напиши съобщение..." readonly autocomplete="off">
        <button class="sending-btn"><i class="fab fa-telegram-plane"></i></button>
        </form>
      </div>
  </div>
  </div>
  <div id="mymodal" class="center-form">
    <div class="wrapper-feedback">
     
        <input type="radio" name="rate" id="star-1">
        <input type="radio" name="rate" id="star-2">
        <input type="radio" name="rate" id="star-3">
        <input type="radio" name="rate" id="star-4">
        <input type="radio" name="rate" id="star-5">
       
        <div class="content-feedback">
            <span class="closer-span">&times;</span>
            <div class="content-user">
            <img src="php/images/<?php echo $row['img']; ?>" class="profile-img" alt="">
            <h1 class="u-name"><?php echo $row['fname']. " " . $row['lname'] ?></h1>
        </div>
        
            <div class="stars">
            
            <label for="star-1" class="star-1 fas fa-star"></label>
            <label for="star-2" class="star-2 fas fa-star"></label>
            <label for="star-3" class="star-3 fas fa-star"></label>
            <label for="star-4" class="star-4 fas fa-star"></label>
            <label for="star-5" class="star-5 fas fa-star"></label> 
            <span class="numb"></span>     
        </div>
        
    </div>
    
    <form action="#" class="typing-area2" autocomplete ="off">
        <input type="text" name="message" class="input-field2" placeholder="Напишете отзива си тук..." autocomplete="off">
        <button class="sending-btn button2"><i class="fab fa-telegram-plane"></i></button>
        </form>
</div>
</div>
</div>
  <div id="mymodal" class="center-form">
  
</div>
</div>
</div>
</div>
  <script src="javascript/users_new.js"></script>
 
  <?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
  
  }
  ?>
</body>
</html>
