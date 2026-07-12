<?php
require_once __DIR__ . '/../config/db.php';
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location:AdminDashboard.php");
    }

//SESSION is like a veriable that can be accessible among defferent pages but the value will last or value will be stored as long as our browser is open

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Laila:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin-login.css" type="text/css">
    


</head>

<body>

    <!-- =============== Navigation ================ -->
    <!-- <div class="containern"> -->
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="basket-outline"></ion-icon>
                        </span>
                        <span class="title">SUPERLAND STORE</span>
                    </a>
                </li>

                <li>
                    <a href="Dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="ManageAdmin.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Admin</span>
                    </a>
                </li>

                <li>
                    <a href="ManageCategory.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Category</span>
                    </a>
                </li>

                <li>
                    <a href="Products.php">
                        <span class="icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Order</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">


            <div class="topbar">
                
                <div class="toggle">
                    <ion-icon name="grid"></ion-icon>
                    <div class="name">
                        <h1>Admin</h1>
                    </div>
                    
                    
                </div>


                <!----------------------User icon----------------------------->
                <div class="user">
                    <img src="../assets/images/dashboard/admin.jpg" alt="">
                </div>
                
            </div>


            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <a href="AddAdmin.php">
                    <div class="card">
                        <div>
                            <div class="numbers">Add<br>Admin</div>
                        </div>

                        <div class="iconBx1">
                            <span><ion-icon name="bag-add"></ion-icon></span>
                        </div>   
                    </div>
                </a>
            
                <a href="ManageAdmin.php">
                    <div class="card">
                        <div>
                            <div class="numbers">View<br>Admin</div>
                        </div>

                        <div class="iconBx2">
                            <span><ion-icon name="eye"></ion-icon></span>
                        </div>
                    </div>
                </a>
                <a href="ManageAdmin.php">
                <div class="card">
                    <div>
                        <div class="numbers">Publish<br>Admin</div>
                    </div>

                    <div class="iconBx3">
                    <span><ion-icon name="bag-check"></ion-icon></span>
                    </div>
                </div>
                </a>
                <a href="ManageAdmin.php">
                <div class="card">
                    <div>
                        <div class="numbers">Edit<br>Admin</div>
                    </div>

                    <div class="iconBx4">
                    <span><ion-icon name="create"></ion-icon></span>
                    </div>
                </div>
                </a>

            </div>

          
                <div class="login-page">
                    <form action="" method="post" class="login-form" enctype="multipart/form-data">
                        <h2><span class="number">Admin Info</span></h2>

                        <div class="input-box">
                            <input type="text" name="full_name"  placeholder="Full Name " required>
                        </div>

                        <div class="input-box">
                            <input type="text" name="username"  placeholder="User Name" required>
                        </div>

                        <div class="input-box">
                            <input type="text" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-box">
                            <input type="password" name="password"  placeholder="password" required>
                        </div>


                        <div class="input-box">
                            <input type="submit" name="btsubmit" value ="Add Admin" >
                        </div>

                    </form>

                        <!-- Process the value from form and save it in db
                        Check whether the submit button is clicked or not -->
                    <?php
                        if(isset($_POST["btsubmit"])){

                            //Get the data from form
                            
                            $full_name=$_POST["full_name"];
                            $username=$_POST["username"];
                            $email = $_POST["email"]; 
                            $password=md5($_POST["password"]); //Password Encryption with MD5

                            //connect to the database
                            $con = db_connect(); //selecting database


                            if (!$con) {
                                die("Sorry, you can't connect into the database.");
                            }

                            //SQL Query to save the data into database

                            //pass the value for query
                            $sql ="INSERT INTO `tbl_admin`(`id`, `full_name`, `username`, `email`, `password`) VALUES (NULL,'$full_name','$username','$email','$password')";

                            if(mysqli_query($con,$sql)){
                                echo "Added successfully.";
                            }else{
                                echo "Something went wrong.";
                            }
            
                        }	
                            
                    ?>
                </div>
        </div>
                                        



   <!-- =========== Scripts =========  -->
   <script src="../assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>















