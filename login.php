<?php
include("connection/connect.php"); 
if(mysqli_errno($conn)){
  echo'erroe';
}

session_start();
	
	
	if(isset($_POST['submit'])){
	
	   $username = mysqli_real_escape_string($conn, $_POST['username']);
	   $pass = md5($_POST['password']);
	
	   $select = " SELECT * FROM users WHERE username = '$username' and password = '$pass' ";
	
	   $result = mysqli_query($conn, $select);
	   $row = mysqli_fetch_array($result);
	   if(mysqli_num_rows($result)){
	     $_SESSION['user_name'] = $row['username'];
		  header('location:products.php');
	
		  //echo "<h1>login Successfully</h1>" ;
	   }else{
		  $error[] = 'incorrect username or password!';
	   }
		 
	 };
	?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Login Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style_css.css">
    </head>

    <body>
  
  <!-- header section starts  -->
  <?php include 'include/header.php'; ?>
  <!-- header section ends -->
        <div class="form-container">
            <form action="" method="post">
                <senter> 
                    <img src="images/generaluser.png" width="120" height="100" alt=""/>
                </senter>
                <h3>login now</h3>
                
                <?php
			   if(isset($error)){
				  foreach($error as $error){
					 echo '<span class="error-msg">'.$error.'</span>';
				  };
			   };
			   ?>
                    <input type="text" name="username" required placeholder="enter your username">
                    <input type="password" name="password" required placeholder="enter your password">
                    <input type="submit" name="submit" value="login now" class="form-btn">
                    <section class="about">
                         <p class="cta">Not registered?<a href="registration.php"> Create an account</a></p>
                        
                    </section>
            </form>

        </div>

    <!-- footer section  -->
    <?php include 'include/footer.php'; ?>
    
    
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
    <script src="js/script.js"></script>
    </body>

    </html>