<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = "SELECT
	users.*
FROM
	users	JOIN messages ON users.unique_id = messages.incoming_msg_id OR users.unique_id = messages.outgoing_msg_id
WHERE  users.unique_id !='$outgoing_id' and (messages.incoming_msg_id='$outgoing_id' OR  messages.outgoing_msg_id='$outgoing_id')
GROUP BY
	user_id
ORDER BY
	MAX(messages.created_at) DESC";


try {
  $query = mysqli_query($conn, $sql);
  $output = "";
  echo mysqli_error($conn);
  if (mysqli_num_rows($query) == 0) {
    $output .= "Няма написани съобщения.";
  } elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";

  }
  echo $output;
} catch (Exception $err) {
  echo $err;
}


?>