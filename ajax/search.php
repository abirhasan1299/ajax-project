<?php
  include '../extension/config.php';
  $data = $_POST['value'];

  $sql = "select * from post where category='{$data}' order by view desc";
  $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $str = "";

  if (mysqli_num_rows($query)>0) {
    while ($row = mysqli_fetch_assoc($query)) {
      $ref = base64_encode($row['id']);
      $user = base64_encode($row['post_user']);

      $string = substr($row['description'],0,400)."...";

      $str .= "<div class='title'>
          <h2 style='color:white;'><i class='bi bi-hash' style='color:#10b981;'></i> {$row['title']}</h2>
      </div>
      <div class='d-flex justify-content-around' style='margin-top:2px;'>
        <h6 style='color:green;'><span class='badge text-bg-primary'><i class='bi bi-eye-fill' style='color:#f43f5e;'></i> {$row['view']}</span></h6>
        <h6 style='color:steelblue;'><span class='badge text-bg-secondary'><i class='bi bi-calendar-check'></i> {$row['date']}</span></h6>
      <h6><span class='badge text-bg-warning'><i class='bi bi-bookmark-check-fill'></i> {$row['category']}</span></h6>
      </div>
      <div class='des'>

          <p style='color:#67e8f9;'>{$string}</p>
          <div class='d-flex justify-content-between'>
            <div style='color:#34d399;'>

            </div>
            <a href='show_post.php?ref={$ref}&user={$user}'  style='text-decoration:none;font-size:18px;'><i class='bi bi-chevron-double-right'></i> Read More  </a>
          </div>
      </div>";
    }
    echo $str;
  }else{
    echo "<h4 style='padding:5px;color:white;text-align:center;'>No Data Found <i style='color:red;' class='bi bi-exclamation-circle-fill'></i></h4>";
  }
?>
