<?php
    session_start();
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $ivan = "don't works";
    if(isset( $_SESSION['unique_id'])){
    $my_id = $_SESSION['unique_id'];
    
    $newArr = array();
    foreach ($_POST['checkbox'] as $category){
        $newArr[] = $category;
    }
    
    if (in_array('garden_help',$newArr)){
       $ivan = "works";
    }

    $sql = "SELECT * FROM missions WHERE NOT user_id = {$my_id} 
    AND (title LIKE '%{$searchTerm}%'
    AND category LIKE '%%') 
     
     ORDER BY default_id DESC ";
} else{
    $sql = "SELECT * FROM missions WHERE (title LIKE '%{$searchTerm}%' AND category LIKE '%delivery%') ORDER BY default_id DESC ";
}

// <?php
// if(isset($_POST['submit'])){
//   if(!empty($_POST['checkbox'])) {
//       foreach($_POST['checkbox'] as $value){
//           echo "Chosen colour : ".$value.'<br/>';
//   }
//   }
// }
//        

    $output = "";
    
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "dataMiss.php";
        echo $ivan;

    }else{
        $output .= 'Няма намерена такава мисия.';
    }
    echo $output;
?>