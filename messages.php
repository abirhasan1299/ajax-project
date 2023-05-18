<!DOCTYPE html>
<?php include "extension/session.php";?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sirah</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "extension/cdn.php";?>
    </head>
<style>
*{
  margin:0px;
  padding:0px;
}
@font-face {
  font-family: kalpurush;
  src: url("style/font/kalpurush.ttf") format("truetype");
}
body{
  background: black;
  font-family: consolas,kalpurush;
}
.body{
  background: white;
  width: 80%;
}
.others{
  border: 1px solid yellow;
  border-radius: 100px;
  width:50%;
  margin-bottom: 5%;
}
.holder{
  padding: 20px;
  overflow-x:hidden;
  overflow-y: scroll;
}
.others p{
  margin-left:8%;
  color:white;
  display: inline-block;
}
.send_box{
  position: fixed;
  bottom:0px;
  padding: 8px;
  width: 48%;
}
.user_count{
  background: yellow;
  padding:5px;
}
.user_count h1{
  color:white;
  padding:5px;
}
.chat_list{
  height:92vh;
  background-color: white;
  overflow-y: scroll;
}

</style>
<body>
<div class="container">
<div class="d-flex justify-content-around">
  <div class="send_box">
    <form method="post" id="form">
      <div class="d-flex justify-content-between">
        <input style="width:90%;" type="text" id="data" placeholder="Type text here">
        <input type="hidden" id="user" value="<?php echo $_SESSION['unique_id']; ?>">
        <input type="hidden" id="date" value="<?php echo date("d-M-Y"); ?>">
        <button style="width:10%;" type="button" id="add" class="btn btn-danger"><i class="bi bi-send-fill"></i></button>
      </div>
    </form>
  </div>
</div>
    <?php include "files/navbar.php";?>
<div class="row">
<div class="col-sm-4">
  <div class="chat_list">
    <div class="user_count">
      <h2 >Acitve User (4)</h2>
    </div>
    <div class="list_of_user">
      <strong><i class="bi bi-person-fill"></i> Sojib Rahman</strong>
      </div>
  </div>
</div>
<div class="col-sm-8">
  <div class="d-flex justify-content-around">
  <div class="body" id="body"></div>
  </div>
</div>
</div>
</div>
</div>

<?php include 'extension/js.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
      function updateStatus() {
        var active = 1;
        var user = $("#user").val();
        $.ajax({
          url:"system/update_status.php",
          type:"POST",
          data:{active:active,user:user},
          success:function(data) {
          }
        });
      }
      updateStatus();
      function loadMessage() {
        var current_user =$("#user").val();
        $.ajax({
            url:"system/load_message.php",
            type:"POST",
            data:{current_user:current_user},
            success:function(data) {
              $("#body").html(data);
            }
        });

      }
      loadMessage();
      $("#add").on("click",function() {
        var user =$("#user").val();
        var data =$("#data").val();
        var date =$("#date").val();
        $.ajax({
          url:"system/add_message.php",
          type:"POST",
          data:{user:user,data:data,date:date},
          success:function(data) {
            document.getElementById('form').reset();
            loadMessage();
          }
        });
      });

    setInterval(function() {
    loadMessage();
}, 200)


  })
</script>
</body>
</html>
