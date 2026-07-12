<?php
require_once __DIR__ . '/../config/db.php';

$conn = db_connect();

session_start();

if(!isset($_SESSION['id'])){
   header('location:Login.php');
   exit();
}
$user_id = $_SESSION['id'];

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:loginHandler.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../assets/css/homeuserstyle.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `tbluser` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            $image = $row["image"];
         }
         if($row["image"] == ''){
            echo '<img src="../assets/images/users/default-avatar.png">';
         }else{
            echo '<img src="../uploads/users/'.$row['image'].'">';
         }
      ?>
      <h3><?php echo $row['username']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="Login.php">login</a> </p>
   </div>

</div>

</body>
</html>