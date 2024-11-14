
<?php
include("../connection/connect.php");

if(isset($_POST['add_admin'])){
   $name = $_POST['name'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $contactnum = $_POST['contactnum'];
   $username= $_POST['username'];
   $password = $_POST['password'];
   $type = $_POST['type'];
   $insert_query = mysqli_query($conn, "INSERT INTO `admin`(`name`, `age`,`email`, `contactnum`, `username`, `password`,`type`) VALUES('$name','$age','$email ','$contactnum', '$username','$password','$type')") or die('query failed');

   if($insert_query){
       echo "<script type= 'text/javascript'>";
         echo "window.alert('Insert Successfully')";
       echo "</script>";
   }else{
           echo "<script type= 'text/javascript'>";
           echo "window.alert('No INSERT')";
           echo "</script>";
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `admin` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:employee.php');
      $message[] = 'admin has been deleted';
   }else{
      header('location:employee.php');
      $message[] = 'admin could not be deleted';
   };
};

if(isset($_POST['update_admin'])){
   $update_s_id = $_POST['update_s_id'];
   $name = $_POST['name'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $contactnum = $_POST['contactnum'];
   $username= $_POST['username'];
   $password = $_POST['password'];
   $type = $_POST['type'];
   
   $update_query = mysqli_query($conn, "UPDATE `admin` SET name = '$name',age='$age',email='$email', contactnum = '$contactnum', username = '$username', password='$password',type='$type' WHERE id = '$update_s_id'");
   
   if($update_query){
    $message[] = 'admin updated succesfully';
    header('location:employee.php');
   }else{
      $message[] = 'admin could not be updated';
      header('location:employee.php');
     }
};
?>

<!DOCTYPE html>
<html lang="en" lang="ar">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Employee form</title>

   <!-- custom css file link  -->

   <link href="css/style.css" rel="stylesheet" type="text/css"/>

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
           
             <h1 style="text-align: center;margin-top: 7rem; font-size: 3rem;">Page of employee Admin</h1>
          </center>
    
    <section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add employee</h3>
   <input type="text" name="name" placeholder="enter the name" class="box" required>
   <input type="number" name="age" min="0" placeholder="enter the User age" class="box" required>
   <input type="email" name="email" class="box" required placeholder="enter your email">
   <input type="number" name="contactnum" min="0" placeholder="enter the contact number" class="box" required>
   <input type="text" name="username"  placeholder="enter the Aramco Id" class="box" required>
   <input type="password" name="password"  placeholder="enter the password" class="box" required>
   <input type="text" name="type"  placeholder="enter the Employee type" class="box" required>
   <input type="submit" value="add the employee" name="add_admin" class="btn">
   
</form>

</section>
    
<section class="display-product-table">

   <table>
      <thead>
         <th>User id</th>
         <th>User name</th>
         <th>User age</th>
         <th>Email</th>
         <th>Aramco Id</th>
         <th>username</th>
         <th>password</th>
         <th>Employee type</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `admin`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contactnum']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td>
                <a href="employee.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="employee.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no employee added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

    
  

  
    
<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?> 

   <form action="" method="post" enctype="multipart/form-data">
       <h2>update the employee</h2>
      <input type="hidden" name="update_s_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="age" value="<?php echo $fetch_edit['age']; ?>">
      <input type="email" class="box" required name="email" value="<?php echo $fetch_edit['email']; ?>">
      <input type="number" min="0" class="box" required name="contactnum" value="<?php echo $fetch_edit['contactnum']; ?>">
      <input type="text" class="box" required name="username" value="<?php echo $fetch_edit['username']; ?>">
       <input type="text" class="box" required name="password" value="<?php echo $fetch_edit['password']; ?>">
       <input type="text" class="box" required name="type" value="<?php echo $fetch_edit['type']; ?>">
      <input type="submit" value="update the User" name="update_admin" class="btn">
      <br/>
      <a href="employee.php" class="option-btn">cancel</a>
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>


<!-- footer section ends -->
<script src="js/script.js" type="text/javascript"></script>

</body>
</html>