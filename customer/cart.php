<?php
require_once __DIR__ . '/../config/db.php';
      session_start();
      if(!isset($_SESSION["email"])){
         header("Location:Login.php");
      }

?> 




<?php

$conn = db_connect(); //selecting database


if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE productID = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE productID = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Laila:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    
    <!--Link font awesome to html page-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



   <!-- custom css file link  -->
   <link rel="stylesheet" href="../assets/css/cartstyle.css">

</head>
<body>

   <div class="parallax">
      <div class="title">shopping cart</div>
   </div>

   <div class="container">

      <section class="shopping-cart">

         <!-- <h1 class="heading">shopping cart</h1> -->

         <table>

            <thead>
               <th>image</th>
               <th>name</th>
               <th>price</th>
               <th>quantity</th>
               <th>total price</th>
               <th>action</th>
            </thead>

            <tbody>

               <?php 
                  $conn = db_connect(); //selecting database

               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $grand_total = 0;
               if(mysqli_num_rows($select_cart) > 0){
                  while($row = mysqli_fetch_assoc($select_cart)){

                     $productID=$row["productID"];                      //--------------------------------------------------------------
                     $product_name=$row["productName"];        
                     // $category = $row["category"];
                     $product_image = $row["imagePath"];
                     $product_price = $row["price"];
                     $product_quantity = $row["quantity"];
                     
               ?>

               <tr>
                  <td><img src="../<?php echo $row["imagePath"]; ?>" height="100" alt=""></td>
                  <td><?php echo $row["productName"]; ?></td>
                  <td>Rs <?php echo number_format($row["price"]); ?>/-</td>
                  <td>
                     <form action="" method="post">
                        <input type="hidden" name="update_quantity_id"  value="<?php echo $row["productID"]; ?>" >
                        <input type="number" name="update_quantity" min="1"  value="<?php echo $row["quantity"]; ?>" >
                        <input type="submit" value="update" name="update_update_btn">
                     </form>   
                  </td>
                  <td>Rs<?php echo $sub_total = $row["price"] * $row["quantity"]; ?>/-</td>
                  <td><a href="cart.php?remove=<?php echo $row["productID"]; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
               </tr>
               <?php
               $grand_total += $sub_total;  
                  };
               };
               ?>
               <tr class="table-bottom">
                  <td><a href="../index.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
                  <td colspan="3">grand total</td>
                  <td>Rs<?php echo $grand_total; ?>/-</td>
                  <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
               </tr>

            </tbody>

         </table>

         <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
         </div>

      </section>

   </div>
   
<!-- custom js file link  -->
<script src="../assets/js/cartscript.js"></script>

</body>
</html>