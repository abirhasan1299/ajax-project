<!DOCTYPE html>
<?php include "../extension/session.php";?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "../extension/cdn.php";?>
    </head>
<style media="screen">
  body{
    background: black;
    font-family: consolas;
  }
  .header{
    color:white;
  }
  #header{
      margin-top: 5%;
  }
  table th,td{
    color:white;
    text-align: center;
  }
</style>
<body>
<div class="container">
<div class="row">
  <div class="d-flex justify-content-between" id="header">
    <div class="header">
      <h1>Salat History</h1>

    </div>
    <div class="back">
      <a href="../home.php" role="button" class="btn btn-info" style="border-radius:50%;"><i class="bi bi-reply-all-fill"></i></a>
    </div>
  </div>
    <hr style="color:white;">
</div>
<div class="row">
<div class="form" style="margin-top:2%;">
  <form class="d-flex justify-content-end" method="post">
    <input type="hidden" id="session" value="<?php echo $_SESSION['unique_id']; ?>">
    <select  name="select" id="select" required>
      <option  value="" disabled selected>Check Your History</option>
      <option value="7">Last 7 days </option>
      <option value="14">Last 14 days </option>
      <option value="21">Last 21 days </option>
      <option value="30">Last 30 days </option>
    </select><br>
  </form>
</div>
<div id="table">


</div>
</div>
</div>
<?php include "../extension/js.php";?>
<script type="text/javascript">
  $(document).ready(function() {

    $("#select").change(function(){
      var value = $(this).val();
      var session = $("#session").val();

        $.ajax({
          url:"../ajax/salat.php",
          type:"POST",
          data:{limit:value,user:session},
          success:function(data) {
            $("#table").html(data);
          }
        });
  });
});
</script>
</body>
</html>
