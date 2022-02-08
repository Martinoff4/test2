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
    <div>Feedbacks</div>


    <script>
    var active = document.querySelector(".navbtn-4");
    active.classList.add("active");
</script>
<?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
}
  ?>
</body>