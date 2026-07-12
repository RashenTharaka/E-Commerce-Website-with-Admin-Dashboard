
<?php
require_once __DIR__ . '/../config/db.php';

session_start();

if(!isset($_SESSION["email"])){
   header('location:Login.php');
   exit();
}
$email = $_SESSION["email"];

if(isset($_GET['logout'])){
   unset($email);
   session_destroy();
   header('location:Login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home</title>

    <!-- <link rel="stylesheet" href="../assets/css/Superland.css"/>
    <link rel="stylesheet" href="../assets/css/cart.css"> -->
    <!-- custom js file link  -->
    <script src="../assets/js/cartscript.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../assets/css/prostyle.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Laila:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    
    <!--Link font awesome to html page-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">





</head>


<body>
    
<div class="container">

   <div class="profile">
      <?php
         //connect to the database
         $con = db_connect(); //selecting database

         $select = mysqli_query($con, "SELECT * FROM `tbluser` WHERE email = '$email' ") or die('query failed');

         if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
         }
         if($row['image'] == ''){
            echo '<img src="../assets/images/users/default-avatar.png">';
         }else{
            echo '<img src="../uploads/users/'.$row['image'].'">';
         }
      ?>
      <h3><?php echo $row['username']; ?></h3>
      <h3><?php echo $row['email']; ?></h3>
      <a href="update_profile.php" class="btn">Update Profile</a>
      <a href="../index.php" class="goback-btn">Go Back</a>
      <a href="Profile.php?logout=<?php echo $email; ?>" class="delete-btn">Logout</a>
      <p>new <a href="Login.php">login</a> or <a href="Login.php">register</a></p>
   </div>

</div>

</body>
</html>