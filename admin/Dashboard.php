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

    <title>Dashboard</title>
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
                        <h1>Dashbord</h1>
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

            <!-- <div class="date">
                <input type="date" >
            </div> -->

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                
                    <div class="card">
                        <div>
                            <div class="numbers">1,504</div>
                            <div class="cardName">Daily Views</div>
                            <h4>Last 24 Hours</h4>
                        </div>

                        <div class="iconBx1">
                            <span><ion-icon name="eye"></ion-icon></span>
                        </div>
                    </div>
                

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                        <h4>Last 24 Hours</h4>
                    </div>

                    <div class="iconBx2">
                        <span><ion-icon name="bag-handle"></ion-icon></span>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                        <h4>Last 24 Hours</h4>
                    </div>

                    <div class="iconBx3">
                    <span><ion-icon name="logo-wechat"></ion-icon></span>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">Rs 7,842</div>
                        <div class="cardName">Earning</div>
                        <h4>Last 24 Hours</h4>
                    </div>

                    <div class="iconBx4">
                    <span><ion-icon name="wallet"></ion-icon></span>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details-twotbl">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2><span class="number">Recent Orders</span></h2>
                                               
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                                <?php
                                    //Create SQL query to get the details
                                    $sql = "SELECT * FROM `order`";

                                    //connect to the database
                                    $con = db_connect();
                                    
                                    //Execute the query
                                    $res = mysqli_query($con, $sql);

                                    if($res==TRUE)
                                    {
                                        //Check whether the data is available or not  
                                        $count = mysqli_num_rows($res);
                                        $sn=1;
                                        //Check wheter we have admin data or not
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id=$row["id"];
                                                $name = $row['name'];
                                                $total_price =$row['total_price'];
                                                
                                                
                                                ?>


                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td>Rs <?php echo $row["total_price"]; ?>.00</td>
                                                    <td><span class="status pending">Processing</span></td>
                                                </tr>

                                                <?php
                                            }                                         
                                        }                                        
                                    }
                                    
                                ?>

                        </tbody>
                    </table>
                </div>
            
                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2><span class="number">Updates</span></h2>
                    </div>

                    <table >
                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <span>recived his order of order0112</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <span>recived his order of order0116</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer05.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <span>recived his order of order0110</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <span>recived his order of order0112</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer03.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <span>recived his order of order0107</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer04.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <span>recived his order of order0109</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer06.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <span>recived his order of order0108</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer03.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <span>recived his order of order0107</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="30px">
                                <div class="imgBx"><img src="../assets/images/dashboard/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <span>recived his order of order0112</span></h4>
                            </td>
                        </tr>

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