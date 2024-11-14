
<?php

include("../connection/connect.php");

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$remove_id'");
   header('location:showSignUp.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Show users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
    <?php include 'include/header.php'; ?>
    <br/><br/>
    
<div class="container">
     <center > 
           
             <h1 style="text-align: center;margin-top: 7rem; font-size: 3rem;">Page of Users</h1>
          </center>
    <section class="display-product-table">

   <table>
      <thead>
        
         <th>name</th>
         <th>email</th>
         <th>phone Number</th>
         <th>Birth date</th>
         <th>Gender</th>
         <th>username</th>
         <th>password</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `users`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
             <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
             <td><?php echo $row['phone']; ?></td>
               <td><?php echo $row['Birth_date']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><a href="showSignUp.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove item from User?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a>
              </td>

         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no register added</div>";
            };
         ?>
      </tbody>
   </table>

</section>
   </div>
    <script src="js/script.js"></script>
</body>
</html>