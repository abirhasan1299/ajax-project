<?php
include '../extension/config.php';

$user = $_POST['user'];

$sql = "select * from notification where user_id='{$user}' order by id desc";
$query = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));
$str = "";
$count =0;
$x = "select id from notification where user_id='{$user}'";
$y = mysqli_query($conn,$x) or die(mysqli_error($conn));
if (mysqli_num_rows($y)>0) {
  while($z = mysqli_fetch_assoc($y)){
    $count += 1;
  }
}
if (mysqli_num_rows($query)>0) {
  $str .= "<div class='header'>
  <div class='d-flex justify-content-between'>
    <h5 style='color:#be123c;'><i class='bi bi-bell'></i> Notification ({$count})</h5>
  </div>
  </div>";
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<div class='data'>
        <p ><i class='bi bi-arrow-right-circle-fill' style='color:#ffc107;padding:3px;'></i> {$row['message']}</p>
    </div>";
  }
  echo $str;
}else{
  echo "<div class='header'>
    <h5 style='color:#be123c;'><i class='bi bi-bell'></i> Notification (0)</h5>
  </div>";
  echo "<div class='data'>
      <p style='text-align:center;'><i style='color:red;' class='bi bi-exclamation-triangle-fill'></i> No Notification </p>
  </div>";
}
 ?>
