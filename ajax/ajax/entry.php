<?php

include '../extension/config.php';

$date = $_POST['date'];
$ff = $_POST['ff'];
$fj = $_POST['fj'];
$fa = $_POST['fa'];
$fm = $_POST['fm'];
$fe = $_POST['fe'];
$quran = $_POST['quran'];
$hadith = $_POST['hadith'];
$hadith_ayat = $_POST['hadith_ayat'];
$truth = $_POST['truth'];
$sadaqah = $_POST['sadaqah'];
$dawah = $_POST['dawah'];
$user = $_POST['user'];

if ($ff == "" || $fj == "" || $fa == "" || $fm == "" || $fe == "") {
  die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i>Minimum Fill the all Salat field ...</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
}

$s = "select date,user from salat";
$r = mysqli_query($conn,$s) or die(mysqli_error($conn));

if(mysqli_num_rows($r)>0){
  while ($x = mysqli_fetch_assoc($r)) {
    if ($x['date'] == date("d-m-Y") && $x['user']==$user) {
      die('<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i> Error </strong>Already Updated , Try Next Day ...
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
    }
  }
}

$sql = "INSERT INTO salat(date,ff,fj,fa,fm,fe,user) VALUES('$date','$ff','$fj','$fa','$fm','$fe','$user')";

$res = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));
$qd ="Null";
$sql_1 = "INSERT INTO activity(dawah,quran,q_ayat,hadith,h_ayat,truth,sadaqah,date,user) VALUES('$dawah','$quran','$qd','$hadith','$hadith_ayat','$truth','$sadaqah','$date','$user')";

$res_1 = mysqli_query($conn,$sql_1) or die("Query Failed: ".mysqli_error($conn)) ;



if($res_1 && $res == True){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check-cirle-fill" style="color:green;"></i> Updated Done</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i> Error </strong>Something Wrong ...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>
