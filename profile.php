<!DOCTYPE html>
<?php include "extension/session.php";?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "extension/cdn.php";?>
    </head>
<?php include "style/style.php"; ?>
<style media="screen">
  .info{
    margin-top: 1%;
    margin-left: 10%;
  }
  .info ul li{
    color:white;
    padding:3px;
  }
  table th{
    color:orange;
  }
  table tr td{
    color:white;
  }
</style>
<body>
<div class="container">
<?php include "files/navbar.php";?>
<div class="row">
  <div class="message" id="message" style="margin-top:1%;">

  </div>
<div class="col-sm-6">
  <div class="create_post" style="margin-top:2%;">

  <form class="form-control" method="post" id="form" autocomplete="off">
    <div class="title">
      <h3 style="text-align:center;color:steelblue;padding:10px;"><i class="bi bi-emoji-smile"></i> What's On Your Mind?</h3>
    </div>
    <div class="d-flex justify-content-between">
      <div class="select">
        <select style="border:2px solid green;border-radius:10px;"  id="category" required>


        </select>
      </div>
      <div class="post-btn">
        <button type="submit" id="post"  class="btn btn-success"><i class="bi bi-send-fill"> Post</i></button>
      </div>
    </div>
    <br>
    <input style="border:1px solid purple;" class="form-control" type="text" id="title" placeholder="Title of Your Content" required>
    <br>
    <input type="hidden" id="post_id" value="<?php echo uniqid(); ?>">
    <input type="hidden" id="view" value="0">
    <input type="hidden" id="session" value="<?php echo $_SESSION['unique_id']; ?>">
    <input type="hidden" id="date" value="<?php echo date("d-m-Y"); ?>">
    <textarea style="border:1px solid green;" class="form-control" id="description" rows="6" cols="56" placeholder="Write Your Context" required></textarea><br>
  </form>
  </div>
</div>
<div class="col-sm-6">
  <div class="profile" style="background:#f43f5e;border-radius:10px;">
    <h3 style="text-align:center;color:white;">Profile</h3>
  </div>
  <div class="info">
    <ul>
      <?php
        include 'extension/config.php';
        $id = $_SESSION['unique_id'];
        $x = "select * from user where unique_id='$id'";
        $y = mysqli_query($conn,$x) or die(mysqli_error($conn));
        if (mysqli_num_rows($y)>0) {
          while ($z = mysqli_fetch_assoc($y)) {

       ?>
      <li><strong><i class="bi bi-envelope-at"></i> Email: </strong> <?php echo $z['email'] ?></li>
      <li><strong><i class="bi bi-person-bounding-box"></i> Name: </strong> <?php echo $z['name'] ?></li>
      <li><strong><i class="bi bi-percent"></i> Age: </strong> <?php echo $z['age'] ?></li>
      <li><strong><i class="bi bi-terminal"></i> Password: </strong> <input type="password" id="myInput" value="<?php echo $z['password'] ?>" disabled></li>
    <?php }}mysqli_close($conn);?>
    </ul>
    <input style="margin-left:28%;" type="checkbox" onclick="myFunction()"> <label style="color:green;">Show Password</label>
  </div>
</div>
</div>
<hr style="color:green;">
<div class="row">

  <div class="my-post" id="mypost">

  </div>

</div>
</div>
<?php include "extension/js.php";?></body>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$(document).ready(function() {

  function loadTable(){
    var session = $("#session").val();
    $.ajax({
      url:"ajax/profile_show_post.php",
      type:"POST",
      data:{user:session},
      success:function(data) {
        $("#mypost").html(data);
      }
    });
  }
  loadTable();

  $("#post").on("click",function(e){
    e.preventDefault();
    var title = $("#title").val();
    var description= $("#description").val();
    var session = $("#session").val();
    var post_id = $("#post_id").val();
    var date = $("#date").val();
    var view = $("#view").val();
    var category = $("#category").val();
    $.ajax({
      url:"ajax/add_post.php",
      type:"POST",
      data:{post_user:session,title:title,description:description,view:view,category:category,date:date,post_id:post_id},
      success:function(data) {
        $("#message").html(data);
        document.getElementById("form").reset();
        loadTable();
      }
    });
    });

  $(document).on("click","#delete",function(){
    var post_id = $(this).data('post_id');
    $.ajax({
      url:"ajax/delete_post.php",
      type:"POST",
      data:{id:post_id},
      success:function(data){
        $("#message").html(data);
        loadTable();
      }
    });
  });

  function category_load(){
    $.ajax({
      url:"ajax/category_load.php",
      type:"POST",
      data:{},
      success:function(data){
        $("#category").html(data);
      }
    });
  }
  category_load();

});
</script>
</body>

</html>
