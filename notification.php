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
<style media="screen">
@font-face {
  font-family: kalpurush;
  src: url("style/font/kalpurush.ttf") format("truetype");
}
body{
  background: black;
  font-family: consolas,kalpurush;
}
.header{
    background:#0d6efd;
    padding: 5px;
}
.notification{
  width: 50%;
}
.data{
  padding: 2px;
  background-color: #198754;
  margin-top: 2px;
}
.data p{
  color:white;
}
</style>
<body>
<div class="container">
<?php include "files/navbar.php";?>
<div class="row">
  <div class="d-flex justify-content-around">
    <div class="notification" id="notification">

    </div>
  </div>
  <div class="d-flex justify-content-around">
    <button type='button' id='delete' class='btn btn-danger' style="width:50%;"><i style='color:white;' class='bi bi-trash3-fill'></i></button>
  </div>
  <div class="message" id="message">

  </div>
</div>
<input type="hidden" id="user_id" value="<?php echo $_SESSION['unique_id']; ?>">
</div>
<?php include "extension/js.php";?>
<script type="text/javascript">
  $(document).ready(function() {

      function loadNotification() {
        var user = $("#user_id").val();
        $.ajax({
          url:"ajax/show_notification.php",
          type:"POST",
          data:{user:user},
          success:function(data){
            $("#notification").html(data);
          }
        });
      }
      loadNotification();
      $("#delete").on("click",function(e) {
        e.preventDefault();
        var u = $("#user_id").val();
        $.ajax({
          url:"ajax/delete_notification.php",
          type:"POST",
          data:{u:u},
          success:function(data){
            $("#message").html(data);
            loadNotification();
          }
        });
      });
  });
</script>
</body>
</html>
