<?php

if (isset($_POST['submit'])) {
  include "extension/config.php";

  $email = mysqli_real_escape_string($conn,$_POST["email"]) ;
  $password = mysqli_real_escape_string($conn,$_POST["password"]) ;

  if ($email=='' || $password=='') {
    die('<div id="alert"  class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i> Please fill the field</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
  }

    $sql = "SELECT * FROM user WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
              session_start();
              session_regenerate_id();
              $_SESSION['email'] = $row['email'];
              $_SESSION['password'] = $row['password'];
              $_SESSION['unique_id'] = $row['unique_id'];
              $_SESSION['age'] = $row['age'];
              $_SESSION['name'] = $row['name'];
              header("Location:home.php");
            }
        }else{
          echo '<div id="alert" class="alert ]=alert-warning alert-dismissible fade show" role="alert">
  <strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i>  Wrong Email & Password</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}

           /***if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             die('<div  class="alert ]=alert-warning alert-dismissible fade show" role="alert">
<strong><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i>  Invalid  Email</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
} ***/


?>
