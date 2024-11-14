
<?php

//@include 'config.php';
include("connection/connect.php"); 
if(mysqli_errno($conn)){
  echo'erroe';
}

if(isset($_POST['submit'])){
   $name = $_POST['fname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $Birth_date=$_POST['Birth_date'];
   $Gender = $_POST['Gender'];
   $username=$_POST['username'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM users WHERE username = '$username' or email = '$email' ";

   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';

   }else{
      if($pass != $cpass){
          
         $error[] = 'password not matched!';
      }else{
          //INSERT INTO `register`(`id`, `name`, `email`, `phone`, `Birth_date`, `Gender`, `username`, `password`)
      $insert = "INSERT INTO users(`name`, `email`, `phone`, `Birth_date`, `Gender`, `username`, `password`) VALUES('$name','$email','$phone',' $Birth_date','$Gender','$username','$pass')";
         $res=mysqli_query($conn, $insert);
          if($res){
       // echo "<h1>Insert Successfully</h1>" ;
           echo "<script type= 'text/javascript'>";
           echo "window.alert('Insert Successfully')";
           echo "</script>";
         }else{
          echo "<script type= 'text/javascript'>";
           echo "window.alert('No INSERT')";
           echo "</script>";
           }
       }


      }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>sign up form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" type="text/css" href="css/style_css.css">
   <link rel="stylesheet" href="css/style.css">
  

</head>
<body>
    
  <!-- header section starts  -->
  <?php include 'include/header.php'; ?>
  <!-- header section ends -->
   <br/>
<div class="form-container">

   <form action="" method="post">
         <senter> 
                    <img src="images/generaluser.png" width="120" height="100" alt=""/>
          </senter>
      <h3>sign up</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <input type="text" name="fname" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="number" name="phone" required placeholder="enter your phone number">
      <input type="date" name="Birth_date" required placeholder="enter your birth date">
      <select name="Gender">
         <option value="Man">Man</option>
         <option value="Woman">Woman</option>
      </select>
      <input type="text" name="username" placeholder="enter your User name "required>
      <input type="password"  name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>
 <?php include 'include/footer.php'; ?>
   
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>
</html>


