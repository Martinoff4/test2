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
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              
            }
            
          ?>
    <body>
        <div class="header-profile">
            <div class="profile-userinfo">
                
                <div class="div-img">
                    <img class="user_img" src="php/images/<?php echo $row['img']; ?>" alt="">
                    </div>
                    <div class="profile-details">
                        <p class="user-info">Име: <span class="bolder-text"><?php echo $row['fname']?></span> </p>
                        <p class="user-info">Фамилия: <span class="bolder-text"><?php echo $row['lname']?></span></p>
                        <p class="user-info">Имейл: <span class="bolder-text"><?php echo $row['email']?></span></p>
                        
                    
                </div>         
        </div>
        <div class="content">
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Изход</a>
        </div>
        <div class="skills-bar">
            <div class="bar">
                
                <div class="badge-test">              
                <img class="badge" src="img_main/test.jpg" alt="">
                
                <div class="progress-line html"><span></span></div>
                <div class="total-p">1 out of 5</div>
            </div>
              <div class="info">
                    <span>Тест</span>
                </div>
            <div class="bar">
                
                <div class="badge-test">
                    <img class="badge" src="img_main/test.jpg" alt="">
                    <div class="progress-line python"><span></span></div>
                    <div class="total-p">1 out of 5</div>
                </div>
                  <div class="info">
                    <span>Тест</span>
                </div>
            <div class="bar">
                
                <div class="badge-test">
                    <img class="badge" src="img_main/test.jpg" alt="">
                    <div class="progress-line mysql"><span></span></div>
                    <div class="total-p">1 out of 5</div>
                </div>
                  <div class="info">
                    <span>Тест</span>
                </div>
            </div>
            <div class="bar">
                
                <div class="badge-test">
                    <img class="badge" src="img_main/test.jpg" alt="">
                    <div class="progress-line css"><span></span></div>
                    <div class="total-p">1 out of 5</div>
                </div>
                  <div class="info">
                    <span>Тест</span>
                </div>
            <div class="bar">

                <div class="badge-test">
                    <img class="badge" src="img_main/test.jpg" alt=""> 
                    <div class="progress-line jquery"><span></span></div>
                    <div class="total-p">1 out of 5</div>    
                </div>
                  <div class="info">
                    <span>Тест</span>
                </div>
        </div>
        <div class="other_btns">
        <div class="button_viewchat">
          <a href="users.php">Виж чат</a>
        </div>
        </div>
    </div>
    <?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
  }
  ?>

</body>
