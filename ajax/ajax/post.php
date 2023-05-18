<?php
include '../extension/config.php';

  $post_id = $_POST['post_id'];

  $str = '';

    //-----------Find Finite Post and Post Access-----------------------//
  $sql = "select * from post where id='{$post_id}'";
  $res = mysqli_query($conn,$sql) or die("Query Faliled: ".mysqli_error($conn));
  if (mysqli_num_rows($res)>0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $i = $row['view']+5;
      $x = "update post set view=$i where id='{$post_id}'";
      $y = mysqli_query($conn,$x) or die("Update Failed: ".mysqli_error($conn));

      $str .= "<title>{$row['title']}</title>";

      //-----------Identify User Access-----------------------//

      $p = "select name from user where unique_id='{$row['post_user']}'";
      $q = mysqli_query($conn,$p) or die("User Query Failed: ".mysqli_error($conn));
      if (mysqli_num_rows($q)>0) {
        while ($r = mysqli_fetch_assoc($q)){
          $name = $r['name'];
        }
      }
      //-----------END Access-----------------------//



      //-----------Insertion of Notification-----------------------//

      $message = "Post ".$row['title']." current view is: ".$row['view']+5;
      $sql_n = "insert into notification(message,user_id) values('{$message}','{$row['post_user']}')";
      $sql_query = mysqli_query($conn,$sql_n) or die("notification query faliled: ".mysqli_error($conn));

      //-----------End of Notification-----------------------//



      //-----------Display the POST -----------------------//
      $des = nl2br($row['description']);

      $str .= "<div class='header'>
        <div class='d-flex justify-content-around'>
          <div class='title'>
              <h1><i class='bi bi-fire'></i> {$row['title']}  <sub><span style='font-size:12px;'><i class='bi bi-pencil-fill'></i> {$name}</span></sub> </h1>
          </div>
          <h6><span  class='badge text-bg-primary'><i class='bi bi-eye-fill' style='color:#f43f5e;'></i> {$row['view']}</span></h6>
          <h6><span  class='badge text-bg-secondary'><i class='bi bi-calendar-check'></i> {$row['date']}</span></h6>
          <h6><span  class='badge text-bg-warning'><i class='bi bi-bookmark-check-fill'></i> {$row['category']}</span></h6>
        </div>
      </div>
      <hr style='color:yellow;'>
      <div class='des'>
        <p style='color:white;font-size:18px;'>{$des}</p>
      </div>";

      $tr ='';
      $tr .= "<div class='row'>
        <p class='display-5' style='color:#e11d48;'>Related Content</p>
        <hr style='color:yellow;'>";
      $a = "select * from post where category='{$row['category']}' order by view desc";
      $b = mysqli_query($conn,$a) or die(mysqli_error($conn));
      if (mysqli_num_rows($b)) {
        while ($c=mysqli_fetch_assoc($b)) {
          $lrb = base64_encode($c['id']);
          $tr .="<span><i style='color:white;' class='bi bi-arrow-bar-right'></i> <a href='show_post.php?ref={$lrb}' style='font-size:20px;'>{$c['title']}</a></span>
          ";
        }
      }
      $tr .="</div>";


    }
    echo $str;
    echo $tr;
  }else{
    echo "<h1 style='color:red;text-align:center;'>Post Does Not Exist</h1>";
  }
  //-----------EEENNNNDDD Finite Post and Post Access-----------------------//
?>
