<?php
    session_start();
    include_once "config.php";
    if(empty($_POST['title'])){
        echo "Моля попълнете формата за заглавие.";
    }
    elseif(empty($_POST['category_mission'])){
        echo "Моля изберете тип мисия.";
    }
    elseif(empty($_POST['regions'])){
        echo "Моля изберете област.";
    }
    elseif(empty($_POST['city'])){
        echo "Моля попълнете формата за град.";
    }
    elseif(empty($_POST['description'])){
        echo "Моля попълнете формата за описание.";
    }
    elseif(empty($_POST['type_mission'])){
        echo "Моля изберете вид на мисията.";
    }
    elseif(empty($_POST['request_numb'])){
        echo "Моля попълнете формата за брой нужни.";
    }
    elseif(empty($_POST['day']) || empty($_POST['month'])){
        echo "Моля попълнете формата за дата.";
    }
    elseif(empty($_POST['date_hour']) || empty($_POST['date_min'])){
        echo "Моля попълнете формата за час.";
    }
    else{
        
        if(isset($_FILES['image'])){
           
            $user_id = $_SESSION['unique_id'];
            $unique_id = rand(time(), 100000000);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $category_mission = mysqli_real_escape_string($conn, $_POST['category_mission']);
            $regions = mysqli_real_escape_string($conn, $_POST['regions']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $type_mission = mysqli_real_escape_string($conn, $_POST['type_mission']);
            $request_numb = mysqli_real_escape_string($conn, $_POST['request_numb']);
            $date_day = mysqli_real_escape_string($conn, $_POST['day']);
            $date_day_real = mysqli_real_escape_string($conn, $_POST['date_day_real']);
            $date_month = mysqli_real_escape_string($conn, $_POST['month']);
            $date_month_numb = mysqli_real_escape_string($conn, $_POST['date_month_numb']);
            $date_month_today = mysqli_real_escape_string($conn, $_POST['date_month_today']);
            $date_hour = mysqli_real_escape_string($conn, $_POST['date_hour']);
            $date_min = mysqli_real_escape_string($conn, $_POST['date_min']);
            

            if($date_month === "Януари" and $date_day <= 31 or $date_month === "Март" and $date_day <= 31 or 
               $date_month === "Май" and $date_day <= 31 or $date_month === "Юли" and $date_day <= 31 or 
               $date_month === "Август" and $date_day < 31 or $date_month === "Октомври" and $date_day <= 31 or 
               $date_month === "Декември" and $date_day <= 31 or 
               $date_month === "Април" and $date_day <= 30 or $date_month === "Юни" and $date_day <= 30 or 
               $date_month === "Септември" and $date_day <= 30 or $date_month === "Ноември" and $date_day <= 30 or 
               $date_month === "Февруари" and $date_day <= 28){

            if($request_numb < 10){
                if($date_day_real >$date_day  &&  $date_month_today >= $date_month_numb || $date_day_real <= $date_day && $date_month_today > $date_month_numb){
                    echo "Не можеш да се връщаш във времето :)";
                } else{

                
                if($date_hour < 19 && $date_hour >= 8){
                    if($date_min < 59){
                      


            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"images_miss/".$new_img_name)){
                        $insert_query = mysqli_query($conn, "INSERT INTO missions (visible, unique_id, user_id, title, category, urban_area, city, description, type_mission, needed_ppl, day, month, hour, minutes, img)
                        VALUES ('none', {$unique_id}, {$user_id},'{$title}', '{$category_mission}', '{$regions}', '{$city}', '{$description}', '{$type_mission}', {$request_numb}, {$date_day}, '{$date_month}', {$date_hour}, {$date_min}, '{$new_img_name}')") or die(mysqli_error($conn));
                        if($insert_query){
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM missions WHERE unique_id = '{$unique_id}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                echo "success";
                            }else{
                                echo "Тази мисия няма как да съществува!";
                            }
                        }else{
                            echo "Нещо се обърка. Моля пробвай отново!";
                        }
                    
                    }
                }else{
                    echo "Моля качи снимка - jpeg, png, jpg";
                }
            }else{
               
                if($category_mission === "transport_help"){
                    $img_name = "nosene.svg";
                } else if($category_mission === "delivery_help"){
                    $img_name = "pazaruvane.svg";
                } else if($category_mission === "garden_help"){
                    $img_name = "rabota-v-gradina.svg";
                } else{
                    $img_name = "drugi.svg";
                }


                $insert_query = mysqli_query($conn, "INSERT INTO missions (visible, unique_id, user_id, title, category, urban_area, city, description, type_mission, needed_ppl, day, month, hour, minutes, img)
                VALUES ('none', {$unique_id}, {$user_id},'{$title}', '{$category_mission}', '{$regions}', '{$city}', '{$description}', '{$type_mission}', {$request_numb}, {$date_day}, '{$date_month}', {$date_hour}, {$date_min},'{$img_name}')") or die(mysqli_error($conn));
                 if($insert_query){
                    $select_sql2 = mysqli_query($conn, "SELECT * FROM missions WHERE unique_id = '{$unique_id}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                        $result = mysqli_fetch_assoc($select_sql2);
                        echo "success";
                    }else{
                        echo "Тази мисия няма как да съществува!";
                    }
                }else{
                    echo "Нещо се обърка. Моля пробвай отново!";
                }
            }
        }
        } else{
            echo "Часът не е по регламента.";
        }

        }
        } else{
            echo "Невалиднa дата.";
            }
        }else{
            echo "Невалидна стойност за деня спрямо месеца.";
        }
        }
    
    }
    
 



    ?>