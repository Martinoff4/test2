<?php
session_start();
include_once "config.php";
if(isset( $_SESSION['unique_id'])){
$my_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM missions WHERE NOT user_id = {$my_id} AND visible = 'yes' ORDER BY default_id DESC";
}
else{
    $sql = "SELECT * FROM missions WHERE visible = 'yes' ORDER BY default_id DESC";
}


try {
  $query = mysqli_query($conn, $sql);
  $output = "";
  echo mysqli_error($conn);
  if (mysqli_num_rows($query) == 0) {
    $output .= "Няма заявени мисии.";
  } elseif (mysqli_num_rows($query) > 0) {
    include_once "dataMiss.php";

  }
  echo $output;
} catch (Exception $err) {
  echo $err;
}


?>