
<?php

include("connection/connect.php"); 
error_reporting(0);
session_start();
if(empty($_SESSION['user_name'])){
 header('location:login.php');
}
?>

<?php

include("connection/connect.php"); 
if(mysqli_errno($conn)){
  echo'erroe';
}

if(isset($_POST['submit'])){

   //INSERT INTO `booking`(`id`, `name`, `email`, `phone`, `coffee_name`, `price`, `card_number`, `card_name`, `exp_month_year`, `CVV`, `username`, `date`)  
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $coffee_name = $_POST['coffee_name'];
      $price = $_POST['price'];
      
      $card_number = $_POST['card_number'];
      $card_name= $_POST['card_name'];
      $exp_month_year = $_POST['exp_month_year'];
      $CVV = $_POST['CVV'];
      
      $username = $_SESSION['user_name'];
            
   $select = " SELECT * FROM booking WHERE username = '$username' and book_name = '$book_name' ";
   
   $result = mysqli_query($conn, $select);
   
   if(mysqli_num_rows($result) > 0){
            echo "<script type= 'text/javascript'>";
           echo "window.alert('Booking already exist in The User and Date!')";
           echo "</script>";
   }else{
               //INSERT INTO `booking`(`name`, `email`, `phone`, `coffee_name`, `price`, `card_number`, `card_name`, `exp_month_year`, `CVV`, `username`, `date`) `name`, `email`, `phone`, `coffee_name`, `price`, `card_number`, `card_name`, `exp_month_year`, `CVV`, `username`)
      $insert = "INSERT INTO `booking`(`name`, `email`, `phone`, `coffee_name`, `price`, `card_number`, `card_name`, `exp_month_year`, `CVV`, `username`) VALUES('$name','$email','$phone','$coffee_name','$price','$card_number','$card_name','$exp_month_year','$CVV','$username')"; 
      $res=mysqli_query($conn, $insert);

          if($res){  
            echo "<script type= 'text/javascript'>";
           echo "window.alert('Insert Successfully')";
           echo "</script>";
      
         }else{
          echo "<script type= 'text/javascript'>";
           echo "window.alert('No INSERT')";
           echo "</script>";
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
    <title>booking form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
</head>

<body>

    <!-- header section starts      -->
 <?php include 'include/header_user.php'; ?>
  
    <!-- header section ends-->
<!-- order section starts  -->
<br/><br/>
<section class="order" style="margin-top: 3rem;" >

        <h3 class="sub-heading"> Booking now </h3>
        <h1 class="heading">  Coffee Shop </h1>

        <form action="" method="post">
      <?php 
      include("connection/connect.php");
      
        error_reporting(0);
         session_start();
      $qml ="select * from products where id='$_GET[booking]'";
	$rest=mysqli_query($conn, $qml); 
	$roww=mysqli_fetch_array($rest);

	?>
            <h1 style="padding: 2rem; border-style:2px;text-align: center;background: #DDDDDD; font-size: 1.6rem;">Coffee Name : <?php echo $roww['name'];?> || Coffee Price : SAR / <?php echo $roww['price'];?> </h1>
            
           
            <div class="inputBox">
                <div class="input">
                    <span>Your Name</span>
                    <input type="text" name="name" placeholder="enter your name" required="">
                </div>
                <div class="input">
                    <span>Your Phone Number</span>
                    <input type="number" name="phone" placeholder="enter your number" required="">
                </div>
            </div>
            <div class="inputBox">
              <div class="input">
                    <span>Your Email</span>
                    <input type="email" name="email" placeholder="enter your email" required="">
                </div>
                <div class="input">

                </div>
            </div>

         <div class="inputBox">
         <h1 style="font-size: 3.5rem"> Accepted Card </h1><br>
         </div>
        <div class="inputBox">
            <img src="images/mad.jpg" style="width:250px; height: 100px;" alt=""/>
       
         </div>
             <div class="inputBox">
                 <div class="input">
                 <span>Credit card number</span><!--name,phone,email,date,pe_number,time ,e_name,city,price,card_number,card_name,exp_month_year,CVV -->
                  <input type="number" placeholder="Credit card number" name="card_number" required="">
                 </div>
                 <div class="input">
                 <span>Your Name of the Card</span>
                 <input type="text" placeholder="Your Name of the Card" name="card_name" required="">
                 </div>
             </div>
            <div class="inputBox">
                 <div class="input">
                 <span>Exp Month/Year</span>
                  <input type="text" placeholder="Exp Month/Year" name="exp_month_year" required="">
                 </div>
                 <div class="input">
                  <span>CVV</span>
                  <input type="number" placeholder="CVV" name="CVV" required="">
                 </div>
             </div>
             <input type="hidden" readonly="" placeholder="<?php echo $roww['name'];?>" value="<?php echo $roww['name'];?>" name="coffee_name" required="">
             <input type="hidden" readonly="" placeholder="<?php echo $roww['price'];?>" value="<?php echo $roww['price'];?>" name="price" required="">
            <input type="submit" value="order now" name="submit" class="btn">

        </form>

    </section>

    <!-- order section ends -->
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>