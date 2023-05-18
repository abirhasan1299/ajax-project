<?php

include '../extension/config.php';

$user = $_POST['u'];

$sql = "DELETE FROM notification WHERE user_id = '{$user}'";

if (mysqli_query($conn,$sql)) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Notification Cleared ... </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else{
  echo mysqli_error($conn);
}

?>
