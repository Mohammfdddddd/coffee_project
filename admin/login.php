
<?php

include("../connection/connect.php");
if(mysqli_errno($conn)){
  echo'erroe';
}

session_start();

if(isset($_POST['submit'])){

   $username =  $_POST['username'];
   $pass = $_POST['password'];
   //`username`, `password`

   $select = " SELECT * FROM `admin` WHERE `username`= '$username' and `password`= '$pass' ";
   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);
   if(mysqli_num_rows($result)){
          header('location:home.php'); 
      //echo "<h1>login Successfully</h1>" ;
   }else{
      echo "<script type= 'text/javascript'>";
           echo "window.alert('incorrect username or password!')";
           echo "</script>";
   }
     
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" 
	integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	 crossorigin="anonymous">
	 
        <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/login.css">
<title>sign in</title>
    </head>
<body>
    <br/><br/><br/><br/>
    <div class="container" style="margin-top: 7rem;">

	<div class="form-container sign-in-container" >
		<form action="" method="post">
                    <img src="../images/adminuser.png" width="95px" height="90px" alt=""/>
            
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
                        <input type="text" name="username" required="required"  placeholder="Username" />
			<input type="password" name="password" required="required" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<input type="submit" name="submit" class="button" value="Login" >
		</form>
	</div>
        <div class="overlay-container" >
            <div class="overlay" >
			<div class="overlay-panel overlay-left">

			</div>
			<div class="overlay-panel overlay-right" style="background-color:red">
				<h1>Hello, My admin!</h1>
				<p>Enter your username and password with us</p>
				<input type="submit" class="button" value="Login" >
			</div>
		</div>
	</div>
</div>
</body>
</html>