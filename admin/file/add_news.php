<?php
include '../../extension/config.php';

$value = $_POST['value'];
if ($value=='') {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Empty Field !</strong>Please fill the blank.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
}


$sql = "insert into daily_news(data) values('{$value}')";

$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($res) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>News Added</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
