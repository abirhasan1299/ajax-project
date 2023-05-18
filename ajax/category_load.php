
<?php
  include '../extension/config.php';

  $x = "select * from category";

  $y = mysqli_query($conn,$x) or die(mysqli_error($conn));
  $str = '';

  if (mysqli_num_rows($y)>0) {
    $str .="<option selected disabled>Choose Category</option>";
    while ($z = mysqli_fetch_assoc($y)) {
      $str .= "<option value='{$z['category']}'>{$z['category']}</option>";
  }
  echo $str;
}else {
  echo "<option> No Category Exits</option>";
}
?>
