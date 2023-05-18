
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <?php include '../extension/cdn.php'; ?>
    <?php include '../extension/js.php'; ?>
</head>
<style media="screen">
*{
margin:0px;
padding: 0px;
}
.header{
  padding: 2%;
}
.form{
margin-top: 2px;
}
.message{
  margin-top: 2px;
}
input[name="category"]{
  width:40%;
}
#form2{
  padding:3px;
}
</style>
<body>
<div class="container">
<div class="row">
<div class="header bg-danger">
  <p class="display-3">Admin Panel</p>
</div>
</div>
<div class="row">
<div class="col-sm-7">
  <form  method="post" class="form" id="form">
    <label for="category"> <span class="badge text-bg-primary">Category</span> </label><br>
    <div class="d-flex justify-content-start">
      <input type="text" class="form-control" id="category" name="category" placeholder="Category Name">
      <button type="button" id="cat" class="btn btn-primary"><i class="bi bi-plus-lg"></i></button>
    </div>
  </form>
  <form class="form2" id="form2" method="post">
    <label for="news"> <span class="badge text-bg-info">News or Quotes</span> </label><br>
    <div class="d-flex justify-content-start">
      <input type="text" class="form-control" id="news" name="news" placeholder="New News">
      <button type="button" id="submit" class="btn btn-info"><i class="bi bi-plus-lg"></i></button>
    </div>
  </form>
</div>
<div class="col-sm-5">
<div class="message" id="message">

</div>
<div id="category_list">

</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    function loadList(){
      $.ajax({
          url:"file/show_category.php",
          type:"POST",
          data:{},
          success:function(data) {
            $("#category_list").html(data);
          }
      });
    }
    loadList();
    $("#cat").on("click",function() {
        var category = $("#category").val();
        $.ajax({
            url:"file/insert_cat.php",
            type:"POST",
            data:{category:category},
            success:function(data) {
              $("#message").html(data);
              document.getElementById("form").reset();
              loadList();
            }
        });
    });
    $("#submit").on("click",function() {
        var value = $("#news").val();
        $.ajax({
            url:"file/add_news.php",
            type:"POST",
            data:{value:value},
            success:function(data) {
              $("#message").html(data);
              document.getElementById("form2").reset();
            }
        });
    });

  });
</script>
</body>
</html>
