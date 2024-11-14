

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee System</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "include/header.php" ?>
    <!-- home section starts  -->

    <section class="home" id="home" style=" background: #fff;">

        <div class="swiper-container home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Coffee system</span>
                        <h3 style="font-size: 4rem;">FRESH COFFEE IN THE MORNING</h3>
                       <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis <a href="login.php" class="btn">Booking now</a>
                    </div>
                    <div class="image">
                        <img src="images/cart-item-2.png" alt=""/>
                        
                       
                    </div>
                </div>

            

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- home section ends -->

   <section class="menu">

        <h3 class="sub-heading"> Some Coffee </h3>
        <h1 class="heading"> Coffee shop system</h1>

        <div class="box-container">
                 <?php
      include("connection/connect.php"); 
      error_reporting(0); 
      session_start();
    $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>
            <div class="box">

              <div class="image">
                  <img src="admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                </div>
                <div class="content">
                    <div class="stars">

                    </div>
                    <h3><?php echo $fetch_product['name']; ?></h3>
                    <p> <?php echo $fetch_product['type_product']; ?></p>
                   
                    <a href="login.php" class="btn">add to booking</a>
                   <span class="price"><?php echo $fetch_product['price']; ?> SAR</span>
                </div>

            </div>
               <?php
         };
     
      };
      
      ?>
        </div>

    </section>

    <!-- menu section ends -->


    <!-- footer section starts  -->
<?php include 'include/footer.php'; ?>

    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>