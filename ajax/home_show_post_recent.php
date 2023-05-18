<?php
include '../extension/config.php';

$sql = "select * from post  order by id desc";
$query = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));
$str = "";
if (mysqli_num_rows($query)>0) {

  while($row = mysqli_fetch_assoc($query)){
    $ref = base64_encode($row['id']);
    $user = base64_encode($row['post_user']);
    $str .="<li>
      <div class='d-flex justify-content-start'>
          <div class='x'>
            <a href='show_post.php?ref={$ref}&user={$user}'><i style='color:red;' class='bi bi-signpost-2'></i> {$row['title']}</a>
          </div>
          <div class='y'>
              <h6>&nbsp; &nbsp; <span class='badge text-bg-warning'><i class='bi bi-bookmark-check-fill'></i> {$row['category']}</h6>
          </div>
      </div>
    </li>";
  }
  echo $str;
}else{
  echo "<h1 style='text-align:center;color:red;'>No Post Found </h1>";
}

?>
