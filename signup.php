<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<style media="screen">
    *{
        margin:0px;
        padding:0px;
        font-family: consolas;
    }
    body{
        background-image: url("style/images/mosjid.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .form{
        width:50%;
        margin-top:5%;
        box-shadow: -10px 10px 10px 5px grey;
        padding:10px;
        border-radius: 5px;
    }
    #header{
      color:black;
      padding: 10px;
    }
    #header h1{
      margin-left: 5%;
    }
</style>
<body>
<div  id="header" class="bg-success">
    <h1><i class="bi bi-browser-firefox"></i> SignUp</h1>
</div>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-around">
            <div class="form">
                <div class="message">
                  <?php
                      if (isset($_POST['submit'])) {
                        include 'files/signup.php';
                      }
                   ?>

                </div>
                <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                    <input class="form-control" type="email" name="email" placeholder="Email Address" required><br>

                    <input class="form-control" type="text" name="name" placeholder="Nick Name" required><br>

                    <input class="form-control" type="number" name="age" placeholder="Your Age" required><br>

                    <input class="form-control" type="password" name="password" placeholder="Choose Password" required><br>

                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password" required><br>

                    <input class="form-control" type="hidden" name="unique_id" value="<?php echo uniqid(); ?>" required>
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="Done" required>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
