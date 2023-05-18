<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "../extension/cdn.php";?>
        <?php include "../extension/js.php";?>
</head>
<style media="screen">
@font-face {
  font-family: kalpurush;
  src: url("../style/font/kalpurush.ttf") format("truetype");
}
body{
  background-color: black;
  font-family: consolas,kalpurush;
}
.form{
  margin-top: 1%;
}
.form label{
  color:red;
  margin-left: 1%;
}
.form textarea,input[name='title']{
  font-size: 18px;
}
#field{
  background-color: #2e1065;
}
</style>
<?php
include '../extension/config.php';
$post_unique_id = base64_decode($_GET['post_id']);

$sql = "SELECT * FROM post WHERE id='$post_unique_id'";
$res = mysqli_query($conn,$sql) or die("Query Failed:".mysqli_error($conn));
if(mysqli_num_rows($res)>0){
  while($row = mysqli_fetch_assoc($res)){
?>
<body>
<div class="container">
<div class="row bg-primary">
  <p class="display-3"><i class="bi bi-database-up"></i> Edit Post</p>
</div>
<div class="row" id="message">
  <?php
      if (isset($_POST['submit'])) {

        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $des = mysqli_real_escape_string($conn,$_POST['description']);
        $category = mysqli_real_escape_string($conn,$_POST['category']);

        $s = "UPDATE post SET title='$title',description='$des',category='$category' WHERE id='$post_unique_id'";
        if (mysqli_query($conn,$s)) {
          header("location:../profile.php");
        }else{
          echo '<div id="alert"  class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i> Update Failed ...</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        }
      }
  ?>
</div>
<div class="row" id="field">
  <div class="d-flex justify-content-around">
      <div class="form">
        <form class="form-control" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
          <div class="d-flex justify-content-end">
            <label for="category"> <span class="badge text-bg-danger">Category</span> </label>
            <select name="category" id="category" required>
              <?php
                  $a = "select * from category";
                  $b = mysqli_query($conn,$a) or die("Query Failed:".mysqli_error($conn));
                  if(mysqli_num_rows($b)>0){
                    while($c = mysqli_fetch_assoc($b)){?>
                <option value="<?php echo $c['category']; ?>"
                    <?php
                      if ($c['category']==$row['category']) {
                        echo "selected";
                      }
                     ?>
                  ><?php echo $c['category']; ?></option>
            <?php }} ?>
          </select><br>
          </div>
          <label for="title"> <span class="badge text-bg-danger">Title</span> </label>
          <input class="form-control" type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
          <label for="des"><span class="badge text-bg-danger">Description</span></label>
          <textarea class="form-control" name="description" rows="12" cols="80"><?php echo $row['description']; ?></textarea><br>
          <input class="form-control btn btn-success" type="submit" name="submit" value="Update">
        </form>
      </div>
  </div>
</div>
<?php } } ?>
</div>
</body>
</html>
