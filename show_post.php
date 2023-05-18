<!DOCTYPE html>
<?php


$post_id = base64_decode($_GET['ref']);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
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
.header{
  margin-top: 2%;
}
.title h1{
  color:white;
}

</style>
<body>
<div class="container">
<?php
session_start();
session_regenerate_id();
if (isset($_SESSION['unique_id'])) {
  include "files/navbar.php";
}else{
  include "files/user_navbar.php";
}
?>
<input type="hidden" id="postNumber" value="<?php echo $post_id; ?>">

<div class="row" id="paste">


</div>
</div>
<?php include 'extension/js.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
  function loadData(){
    var post_id = $("#postNumber").val();
    $.ajax({
      url:"ajax/post.php",
      type:"POST",
      data:{post_id:post_id},
      success:function(data) {
        $("#paste").html(data);
      }
    });
  }
  loadData();
});
</script>
</body>

</html>
