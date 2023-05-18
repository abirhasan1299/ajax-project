<?php
include '../../extension/config.php';

$str = '';
$sql = "select * from category order by id desc";
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if (mysqli_num_rows($res)>0) {
  while ($row = mysqli_fetch_assoc($res)) {
      $str .= "<span style='color:steelblue;' class='badge text-bg-secondary'> {$row["category"]}</span>";
  }
  echo $str;
}else{
  echo "<h4 style='color:red;'>No category found !</h4>";
}

?>
