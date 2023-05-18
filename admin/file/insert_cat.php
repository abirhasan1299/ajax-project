<?php
include '../../extension/config.php';

$value = $_POST['category'];
if ($value=='') {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Empty Field !</strong>Please fill the blank.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
}
$s = "select * from category where category='{$value}'";
$r = mysqli_query($conn,$s) or die(mysqli_error($conn));
if (mysqli_num_rows($r)>0) {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Already Exist !</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
}


$sql = "insert into category(category) values('{$value}')";

$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($res) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Category Added</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
