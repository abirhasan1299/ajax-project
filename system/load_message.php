<?php
include "../extension/config.php";
$current_user = $_POST['current_user'];
$sql = "SELECT * FROM messages order by id desc";
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

$str = '<div class="holder"style="height:92vh;">';

if (mysqli_num_rows($res)>0) {
  while ($row = mysqli_fetch_assoc($res)) {
    if ($row['user_id']!=$current_user) {
      $str .= "<div class='d-flex justify-content-start' style='padding:2px;'>
                  <div class='others bg-warning'>
                    <p style=''>{$row['text']}</p>
                  </div>
                </div>";
    }else{
      $str .= "<div class='d-flex justify-content-end' style='padding:2px;'>
                  <div class='others bg-primary' style='border:1px solid #0d6efd;'>
                    <p style=''>{$row['text']}</p>
                  </div>
              </div>";
    }
  }
  echo $str;
}else{
  echo "No message Found";
}

?>
