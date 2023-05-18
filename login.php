<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "extension/cdn.php";?>
    </head>
<style>
*{
    margin: 0px;
    padding: 0px;
}
@font-face {
    font-family: sirah;
    src: url("style/font/title.ttf") format("truetype");
}
body{
    background-color:#18181b;
    font-family: consolas;
}

#alert{
    width:40%;
    position:fixed;
    left:30%;
    bottom:5px;
    background:#ffc107;
    color:red;
}
.form{
    margin-top: 5%;
    width: 40%;
}
#login img{
  width:20% ;
  border: 1px solid steelblue;
  padding:2px;
  border-radius: 50%;
  margin-top: 2%;
}
</style>
<body>

<div class="container">
    <div class="row">
        <br><br>
        <div class="d-flex justify-content-around" id="login">
          <img src="style/images/lock.png" alt="">
        </div>
        <div class="d-flex justify-content-around">
            <div class="form">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  autocomplete="off">
                    <input class="form-control" type="email" name="email" placeholder="Email" required><br>
                    <input class="form-control" type="password" name="password" placeholder="Password" required><br>
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="Login" required>
                </form>
            </div>
            <?php include 'system/verify_login.php'; ?>
        </div>
    </div>
</div>

<?php include 'extension/js.php'; ?>
<script type="text/javascript">

</script>
</body>
</html>
