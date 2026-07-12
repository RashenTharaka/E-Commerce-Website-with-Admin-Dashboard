<?php
require_once __DIR__ . '/../config/db.php';
session_start();
if(!isset($_SESSION["email"])){
	header("Location:AdminDashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <title>Manage Category</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
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
                        <h1>Category</h1>
                    </div>
                    
                    
                </div>

                <!----------------------Search Bar----------------------------->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search...">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
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

                <a href="ManageCategory.php">
                <div class="card">
                    <div>
                        <div class="numbers">Publish<br>Category</div>
                    </div>

                    <div class="iconBx3">
                    <span><ion-icon name="bag-check"></ion-icon></span>
                    </div>
                </div>
                </a>
                <a href="ManageCategory.php">
                <div class="card">
                    <div>
                        <div class="numbers">Edit<br>Category</div>
                    </div>

                    <div class="iconBx4">
                    <span><ion-icon name="create"></ion-icon></span>
                    </div>
                </div>
                </a>

            </div>
        
        
            
            <div class="details"> <!--MAIN CONTENT-->

                <div class="recentOrders">  <!--WRAPPER-->


                        <?php
                            if(isset($_SESSION['delete']))
                            {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                            }
                        ?>

                        <?php
                            if(isset($_SESSION['update']))
                            {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                            }

                        ?> 
                            
                        <div class="cardHeader">
                            <h2><span class="number">Recent Categories</span></h2>
                                                              
                        </div>
                            

                        <table>
                                
                            
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Title</th>
                                    <th>Image Name</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    //Create SQL query to get the details
                                    $sql = "SELECT * FROM `tbl_category`";

                                    //connect to the database
                                    $con = db_connect();
                                    
                                    //Execute the query
                                    $res = mysqli_query($con, $sql);

                                    if($res==TRUE)
                                    {
                                        //Check whether the data is available or not  
                                        $count = mysqli_num_rows($res);
                                        
                                        //Create serial number veriable and assing value
                                        $sn=1;
                                        //Check wheter we have admin data or not
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id=$row["id"];
                                                $title=$row["title"];
                                                $image_name=$row["image_name"];
                                                $featured=$row["featured"];
                                                $active=$row["active"];
                                                
                                                ?>

                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $row["title"]; ?></td>
                                                    <td><img src="../<?php echo $row["image_name"]; ?>" width="100px" hight="100px"></td>
                                                    <td><?php echo $row["featured"]; ?></td>
                                                    <td><?php echo $row["active"]; ?></td>
                                                    <td>
                                                        <a href="EditCategory.php?id=<?php echo $row["id"]; ?>"><button class="btn-edit">Edit Category</button></a>
                                                        <a href="DeleteCategory.php?id=<?php echo $row["id"]; ?>"><button class="btn-delete">Delete Category</button></a><!--passing the value through url mean GET method--> 

                                                    </td>
                                                </tr>
                                                

                                                <?php
                                            }                                         
                                        }                                        
                                    }
                                    
                                ?> 
                            </tbody>
                            

                        </table>


                </div>
            </div>
            

        </div>

        
        
    </div>  












    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>