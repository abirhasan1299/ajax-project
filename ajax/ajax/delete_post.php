<?php
  include '../extension/config.php';

  $id = base64_decode($_POST['id']);

  $sql = "delete from post where id='{$id}'";

  if (mysqli_query($conn,$sql)) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Deleted ! </strong>One Item was deleted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Something Went Wrong !</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

 ?>
