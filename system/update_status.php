<?php
  include "../extension/config.php";
  $user = $_POST['user'];
  $active = $_POST['active'];

  $sql = "UPDATE user SET status={$active} WHERE unique_id='{$user}'";
  if (mysqli_query($conn,$sql)) {

  }else{
    echo mysqli_error($conn);
  }
?>
