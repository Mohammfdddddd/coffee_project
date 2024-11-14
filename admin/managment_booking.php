
<?php

include("../connection/connect.php");


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `order` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:managment_booking.php');
      $message[] = 'managment booking has been deleted';
   }else{
      header('location:managment_booking.php');
      $message[] = 'managment booking could not be deleted';
   };
};

?>

<!DOCTYPE html>
<html lang="en" lang="ar">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Managment booking form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'include/header.php'; ?>

<div class="container">

        <center > 
           
             <h1 style="text-align: center;margin-top: 10rem; font-size: 4rem;">Page of managment booking</h1>
          </center>
    

 

<section class="display-product-table">

   <table>
      <thead>
      <th>name</th>
         <th>number</th>
         <th>method</th>
         <th>street</th>
         <th>city</th>
         <th>country</th>
         <th>pin code</th>
         <th>total products</th>
         <th>total price</th>
         <th>Calnder</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
  

            $select_products = mysqli_query($conn, "SELECT * FROM `order`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
           <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
             <td><?php echo $row['method']; ?></td>
               <td><?php echo $row['street']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td><?php echo $row['pin_code']; ?></td>
                <td><?php echo $row['total_products']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['Calnder']; ?></td>
            <td>
                <a href="managment_booking.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no managment booking added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

   </div>
    <br/> <br/> <br/>




   <!-- footer section starts  -->


<!-- footer section ends -->


</body>
</html>