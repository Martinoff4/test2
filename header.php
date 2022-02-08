<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Помогни сега</title>
<link rel="stylesheet" href="css/style_new.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  
</head>
<body>
<?php 
if(isset($_SESSION['unique_id'])){
   $sql_img = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql_img) > 0){
              $row_img = mysqli_fetch_assoc($sql_img);
                }
            }
?>
<header class="navvs-header sticky">
        <div class="logo"><a href="./missions.php">Помогни сега!</a></div> 

        <nav>
            <input type="checkbox" id="click"">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a class="navbtn-1" href="index.php">Начало</a></li>
                <li><a class="navbtn-2" href="missions.php">Мисии</a></li>
                <li><a class="navbtn-3" href="request.php">Заяви</a></li>
                <li><a class="navbtn-4" href="feedbacks.php">Отзиви</a></li>
                <li><a class="cta-1 navbtn-5" href="profile.php" >Профил</a></li>
            </ul>
        </nav>
        <a href="profile.php" class="cta"><i class="fa fa-user"></i></a>
        <a href="profile.php" class="img_cta"><img class="nav_img" src="php/images/<?php echo $row_img['img']; ?>" alt=""></a>
    </header>
</body>