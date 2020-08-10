<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress");  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="login-clean">
        <form method="post" name="form1" action="">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="fa fa-user-circle text-danger"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="username" required placeholder="User Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" required="" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" name="submit1" class="btn btn-block btn-danger" value="Log In">
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<html>
<?php

if(isset($_POST["submit1"]))
{
    $res=mysqli_query($link,"select * from admin_login where username='$_POST[username]' && password='$_POST[password]'");

    while($row=mysqli_fetch_array($res)){
        $_SESSION["admin"]=$row["username"]; 
  ?>
  <script type="text/javascript">
      window.location="admin.php"
  </script>


<?php

}
}
?>