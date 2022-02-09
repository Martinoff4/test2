<?php
session_start();
include_once "config.php";
if(!empty($_POST['searchEngine'])){
    $title = $_POST['searchEngine'];
}else{
    $title="";
}
if(!empty($_POST['transport_help'])){
    $nosene = $_POST['transport_help'];
}else{
    $nosene = "";
}
if(!empty($_POST['delivery_help'])){
    $pazaruvane = $_POST['delivery_help'];
}else{
    $pazaruvane = "";
}
if(!empty($_POST['garden_help'])){
    $rabotavgr = $_POST['garden_help'];
}else{
    $rabotavgr = "";
}
if(!empty($_POST['other_help'])){
    $drugi = $_POST['other_help'];
}else{
    $drugi = "";
}

    

if(isset( $_SESSION['unique_id'])){
$my_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM missions WHERE NOT user_id = {$my_id} AND visible = 'yes'";
 if(!empty($nosene or $pazaruvane or $rabotavgr or $drugi)){
     $sql .= "AND (";
 }
 if(!empty($nosene)){
    $sql.= " category = '{$nosene}' or";
}
if (!empty($pazaruvane)){
    $sql.= " category = '{$pazaruvane}' or";
}
if (!empty($rabotavgr)){
    $sql.= " category = '{$rabotavgr}' or";
}
if (!empty($drugi)){
    $sql.= " category = '{$drugi}' or";
}
if(!empty($nosene or $pazaruvane or $rabotavgr or $drugi)){
    $sql .= " '')";
} 
$sql .= "ORDER BY default_id DESC";

// AND (title LIKE '%{$title}%') 
// AND (category = '{$nosene}' or category = '{$pazaruvane}' 
// or category = '{$rabotavgr}' or category = '{$drugi}')
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

