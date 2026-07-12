<?php
require_once __DIR__ . '/../config/db.php';
session_start();
if(!isset($_SESSION["email"])){
	header("Location:AdminDashboard.php");
}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Products</title>


    <!-- <link rel="stylesheet" href="assets/css/Superland.css"/> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Laila:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/formStyle.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css">


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
                        <h1>Edit</h1>
                    </div>
                    
                    
                </div>


                <!----------------------User icon----------------------------->
                <div class="user">
                    <img src="../assets/images/dashboard/admin.jpg" alt="">
                </div>               
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <a href="AddCategory.php">
                    <div class="card">
                        <div>
                            <div class="numbers">Add<br>Category</div>
                        </div>

                        <div class="iconBx1">
                            <span><ion-icon name="bag-add"></ion-icon></span>
                        </div>   
                    </div>
                </a>
            
                <a href="ManageCategory.php">
                    <div class="card">
                        <div>
                            <div class="numbers">View<br>Category</div>
                        </div>

                        <div class="iconBx2">
                            <span><ion-icon name="eye"></ion-icon></span>
                        </div>
                    </div>
                </a>

                <div class="card">
                    <div>
                        <div class="numbers">Publish<br>Category</div>
                    </div>

                    <div class="iconBx3">
                    <span><ion-icon name="bag-check"></ion-icon></span>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">Edit<br>Category</div>
                    </div>

                    <div class="iconBx4">
                    <span><ion-icon name="create"></ion-icon></span>
                    </div>
                </div>
            </div>

            <!-- ======================= Form ================== -->          
            <div class="form-style-5">
                <?php 
                        //Get the ID of selected admin
                        $id = $_GET['id'];

                        //connect to the database
                        $con = db_connect(); //selecting database

                        if (!$con) {
                            die("Sorry, you can't connect into the database.");
                        }

                        //Create SQL query to get the details
                        $sql = "SELECT * FROM tbl_category WHERE `id`=$id ";

                        //Execute the query
                        $res = mysqli_query($con,$sql);

                        //Check whether the Query is Execute or not
                        if($res==TRUE){

                            //Check whether the data is available or not
                            $count = mysqli_num_rows($res);

                            //Check wheter we have admin data or not
                            if($count==1){

                                // echo"Admin Available";
                                $row=mysqli_fetch_assoc($res);

                                //Get the data from form
                                                            //--------------------------------------------------------------
                                $title=$row["title"];        
                                $image_name = $row["image_name"];
                                $featured = $row["featured"];
                                $active = $row["active"];
                                // $password=md5($row["password"]);

                            }
                            

                        }
                ?>
                <form action="" method="post" class="login-form" enctype="multipart/form-data"> <!-- ALLOW TO UPLOAD IMAGE-->
                        <h2><span class="number">Category Info</span></h2>

                        <div class="input-box">
                            <input type="text" name="title"  value="<?php echo $title; ?>">
                        </div>
                        <div class="input-box">
                            <input type="file" name="imageFile" value="<?php echo $image_name; ?>">
                        </div>
                        <!-- <div class="input-box">
                            <input type="text" name="image_name"  placeholder="Image Name" required>
                        </div> -->

                        
                        <div class="rawAdd" >
                            <div class="colAdd" >
                            <h4 class="rawh3" ><span class="featured">Featured :</span></h4>
                            </div>
                            <div class="colAdd2" >
                                <div class="rawAdd" >
                                    <div class="colRadio" >
                                        <input type="radio" name="featured" value="<?php echo $featured; ?>">Yes
                                    </div>
                                    <div class="colRadio" >
                                        <input type="radio" name="featured" value="<?php echo $featured; ?>">No
                                    </div>
                                </div>
                            </div>                     
                        </div>

                        <div class="rawAdd" >
                            <div class="colAdd" >
                            <h4 class="rawh3" ><span class="featured">Active :</span></h4>
                            </div>
                            <div class="colAdd2" >
                                <div class="rawAdd" >
                                    <div class="colRadio" >
                                        <input type="radio" name="active" value="<?php echo $active; ?>">Yes
                                    </div>
                                    <div class="colRadio" >
                                        <input type="radio" name="active" value="<?php echo $active; ?>">No
                                    </div>
                                </div>
                            </div>                     
                        </div>


                        <div class="input-box" colspan="2">
                            <input type="hidden" name="id" value ="<?php echo $id; ?>" >
                            <input type="submit" name="btsubmit" value ="Add Admin" >
                        </div>

                    </form>

                        <!-- Process the value from form and save it in db. Firstly
                        Check whether the submit button is clicked or not -->
                    <?php
                        if(isset($_POST["btsubmit"])){

                            //Get the data from form
                            
                            $title=$_POST["title"];
                            // $image_name=$_POST["image_name"];
                            // $email = $_POST["email"]; 
                            // $password=md5($_POST["password"]); //Password Encryption with MD5
                            
                            if(isset($_POST["featured"])){
                                $featured=$_POST["featured"];
                            }
                            else{
                                $featured="No";
                            }

                            if(isset($_POST["active"])){
                                $active=$_POST["active"];
                            }
                            else{
                                $active="No";
                            }

                            //Check whether teh image is selected or not and set the value for image name 

                            $image_name = "assets/images/categories/" . basename($_FILES["imageFile"]["name"]);
                            move_uploaded_file($_FILES["imageFile"]["tmp_name"], "../" . $image_name);


                            // $image_name =$_FILES["imageFile"]["name"];
                            // move_uploaded_file($_FILES["imageFile"]["tmp_name"], "../" . $image_name);

                            

                            //connect to the database
                            $con = db_connect(); //selecting database


                            if (!$con) {
                                die("Sorry, you can't connect into the database.");
                            }

                            //SQL Query to save the data into database

                            //pass the value for query
                            $sql ="UPDATE `tbl_category` SET `title`='$title',`image_name`='$image_name',`featured`='$featured',`active`='$active' WHERE `id`='$id'";

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















