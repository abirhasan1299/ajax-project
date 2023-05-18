<?php
include '../extension/config.php';

$title = $_POST['title'];
$des = $_POST['description'];
$cat = $_POST['category'];
$post_user = $_POST['post_user'];
$post_id = $_POST['post_id'];
$view = $_POST['view'];
$date = $_POST['date'];

if ($title=='') {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Empty Title !</strong>Please fill the blank.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
}elseif ($des=='') {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Empty Description Box !</strong>Please fill the blank.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
}elseif ($cat=='') {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Choose Category !</strong>Please fill the blank.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
}else{
  $sql = "insert into post(post_unique_id,post_user,title,description,date,view,category) values('{$post_id}','{$post_user}','{$title}','{$des}','{$date}','{$view}','{$cat}')";

  $query = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Posted Successfully <i class="bi bi-check-circle-fill" style="color:green;"></i></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



 ?>
