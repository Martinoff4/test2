<?php 
    while($row = mysqli_fetch_assoc($query)){
        $iconImg = "";
        $display = "";
        $color = "";
        
        if($row['category'] == "transport_help"){
            $iconImg = "nosene.svg";
            $color = "#F16622";
        }
        if($row['category'] == "delivery_help"){
            $iconImg = "pazaruvane.svg";
            $color = "#9ACB53";
        }
        if($row['category'] == "garden_help"){
            $iconImg = "rabota-v-gradina.svg";
            $color = "#E6AF2C";
        }
        if($row['category'] == "other_help"){
            $iconImg = "drugi.svg";
            $color = "#8852A1";
        }
        if($row['img'] == 'nosene.svg' || $row['img'] == 'pazaruvane.svg' || $row['img'] == 'rabota-v-gradina.svg' || $row['img'] == 'drugi.svg'){
            $iconImg = "";
            $display = "none";
        }
        $title = $row['title'];
        $description = $row['description'];
        if(strlen($title) > 30){
        $firstBlSpace = strpos($description, " ", 30);
        ( strlen($title) > 30) ? $msg =  substr($title, 0, $firstBlSpace). '...' : $msg = $title;
      }else{
        $msg = $title;
      }
      if(strlen($description) > 100){
        $firstBlSpace2 = strpos($description, " ", 100);
        ( strlen($description) > $firstBlSpace2) ? $msg1 =  substr($description, 0,  $firstBlSpace2). '...' : $msg1 = $description;
      }else{
        $msg1 = $description;
      }
        $output .= '
        <div class="realmission-wrapper" style="background:'. $color .'">
        <a class="a-content" href="index.php">
        <div class="icon" style="display:'. $display .'">
          <div class="center">
          <img src="img_main/' . $iconImg .'" alt="">
        </div>
        </div>
        <div class="needed-ppl">
          <div class="center">
          <img src="img_main/child-solid.svg" alt="">
          <h2>'. $row['needed_ppl'] .'</h2>
          </div>
        </div>
        <div class="mission-img">
          <img src="php/images_miss/'. $row['img'].'" alt="">
        </div>
        <div class="title">
          <h1 style="color: #000;">'. $msg .'</h1>
        </div>
        <div class="description">
          <p style="color: #000;">' . $msg1. '</p>
        </div>
        <div class="remaining-time">
          <p>'. $row['day'] .' '. $row['month'].'</p>
        </div>
        <div class="location">
          <p>'. $row['urban_area'] .'</p>
        </div>
        </a>
           </div>         
                ';
    }
    
?>