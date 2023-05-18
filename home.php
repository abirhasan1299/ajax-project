<!DOCTYPE html>
<?php
  include 'extension/session.php';
 ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "extension/cdn.php";?>
    </head>
<style media="screen">
@font-face {
  font-family: kalpurush;
  src: url("style/font/kalpurush.ttf") format("truetype");
}
body{
  background-color: black;
  font-family: consolas,kalpurush;
}
.box{
  border:1px solid #7c3aed;
  border-radius: 20px;
  margin-top: 1%;
}
.title{
  background-color: #7c3aed;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}
.title,.des{
  padding:10px;

}
.message{
  margin-top: 1%;
}
.detail ul li{
  list-style-type: none;
}
.detail ul li a{
  text-decoration: none;
  font-size: 18px;
  color:#4c0519;
}
.detail ul li a:hover{
  text-decoration:underline;
  color:white;
}
#start{
  background-color: #93c5fd;
  padding:2px;
  border-radius: 5px;
}
</style>
<body>
<div class="container">
<div class="row" id="start">
<div class="col-sm-8" id="news">

</div>
<div class="col-sm-3">
<div class="d-flex justify-content-around">
  <div class="">
    <span class="badge text-bg-danger"><label style="color:white;">Search: </label></span>
  </div>
  <div class="">
    <select style="border:2px solid red;border-radius:10px;"  id="choose" required>

    </select>
  </div>
</div>
</div>
</div>
<?php include 'files/navbar.php';?>
<div class="row">
<div class="message" id="message">

</div>
</div>
<div class="row">
<div class="col-sm-6">
  <div class="box" id="box">

  </div>
</div>
<div class="col-sm-6">
     <div class="create_post" style="margin-top:2%;">

     <form class="form-control" method="post" id="form" autocomplete="off">
       <div class="tit">
         <h3 style="text-align:center;color:steelblue;padding:10px;"> <i class="bi bi-emoji-smile"></i> What's On Your Mind?</h3>
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
  <br>
<div class="recent-post" style="background:#fb7185;border-radius:20px;">
  <div class="head" style="padding:7px;margin-left:2%;">
    <h2 style="color:#064e3b;"><i class="bi bi-inboxes"></i> Recent Post</h2>
    <hr>
  </div>

  <div class="detail">
    <ul id="list">

    </ul>
  </div>
</div>
</div>
</div>
<?php include 'files/footer.php'; ?>
</div>
</body>
<?php include "extension/js.php";?></body>
<script type="text/javascript">
  $(document).ready(function(){
    function loadTable(){
      $.ajax({
        url:"ajax/home_show_post.php",
        type:"POST",
        success:function(data) {
          $("#box").html(data);
        }
      });
    }
    function loadRecent(){
      $.ajax({
        url:"ajax/home_show_post_recent.php",
        type:"POST",
        success:function(data) {
          $("#list").html(data);
        }
      });
    }
    loadRecent();
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
          loadRecent();
        }
      });
      });
      $("#choose").on("change",function() {
        var value = $(this).val();
        $.ajax({
          url:"ajax/search.php",
          type:"POST",
          data:{value:value},
          success:function(data){
            $("#box").html(data);
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
            $("#choose").html(data);
          }
        });
      }
      category_load();
      function news_load(){
        $.ajax({
          url:"ajax/news_load.php",
          type:"POST",
          data:{},
          success:function(data){
            $("#news").html(data);
          }
        });
      }
      news_load();
  });
</script>
</html>
