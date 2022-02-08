<?php 
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
            ( strlen($result) > 28) ? $msg =  substr($result, 0, 28). '...' : $msg = $result;
        }else{
            $result ="Няма написани съобщения.";
            $msg = $result;
            $send_from = '';
        }
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = ""; 

        $send_from = '';
        if(mysqli_num_rows($query2) > 0){
        
        $sql3 = "SELECT * FROM users WHERE  (unique_id = {$row2['outgoing_msg_id']})";
        $query3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($query3);
        if(mysqli_num_rows($query3) > 0){

        $my_id = $_SESSION['unique_id'];
        if($row3['unique_id'] == $my_id){
            $send_from = '<span style="color: #E6AF2E !important;">аз: </span>';
        } else if($row3['unique_id'] != $my_id){
            $send_from = '<span style="color: #3D348B !important;">'. $row3['fname']. ': </span>';
        }
        }
    
    } else{$send_from = '';}
        $output .= '<a class="a-content" href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $send_from . $msg .'</p>
                    </div>
                    </div>
                    
                </a>';
    }
    
?>
<html>
    <body>
        
    
</body>
</html>