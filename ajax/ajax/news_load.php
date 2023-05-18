<?php
include '../extension/config.php';

$x = "select * from daily_news order by id desc limit 1";

$y = mysqli_query($conn,$x) or die(mysqli_error($conn));
$str = '';

if (mysqli_num_rows($y)>0) {
  while ($z = mysqli_fetch_assoc($y)) {
    $str .= "<marquee direction='left'><p style='font-size:15px;color:red;' >{$z['data']}</p></marquee>";
}
  echo $str;
}else {
  echo "No News Found";
}

?>
