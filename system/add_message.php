<?php
  include "../extension/config.php";
$user = $_POST['user'];
$data = $_POST['data'];
$date = $_POST['date'];

if ($data=='') {
  die();
}

$sql ="INSERT INTO messages(user_id,text,date) values('{$user}','{$data}','{$date}')";

mysqli_query($conn,$sql) or die(mysqli_error($conn));


?>
