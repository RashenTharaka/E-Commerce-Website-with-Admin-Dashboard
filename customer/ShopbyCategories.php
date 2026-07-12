<?php
require_once __DIR__ . '/../config/db.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['productName']; //productName kiyana name eka $product_name ekata assign kara 
   $product_price = $_POST['price'];
   $product_image = $_POST['imagePath'];
   $product_quantity = $_POST['quantity'];

   //connect to the database
   $con = db_connect(); //selecting database

   $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE productName = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(productID, productName, price, imagePath, quantity) VALUES(NULL, '$product_name', '$product_price', '$product_image', '$product_quantity')");
      header("Location:ShopbyCategories.php");
   }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home</title>

    <link rel="stylesheet" href="../assets/css/Superland.css"/>
    <link rel="stylesheet" href="../assets/css/cart.css">
    <!-- custom js file link  -->
    <script src="../assets/js/cartscript.js"></script>
    


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Laila:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    
    <!--Link font awesome to html page-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">





</head>


<body>



    
<div class="menu" id="sticky">
        <ul class="menu-ul">
            <a href="../index.php"><li class="a-menu"><i class="fa-solid fa-house-user"></i> Home</li></a>
            <a href="#product"><li class="a-menu"><i class="fa-solid fa-store"></i> Store</li></a>
            <a href="Login.php" ><li class="a-menu"><i class="fa-solid fa-right-to-bracket"></i> Login</li></a>

            <?php

            $con = db_connect(); //selecting database

            $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

            ?>

            <a href="cart.php"><li class="icon-cart"><i class="fa-solid fa-cart-shopping"></i><span><?php echo $row_count; ?></span></li></a>
            <!-- <li class="icon-cart"><i class="fa-solid fa-cart-shopping"></i><span>0</span></li>  -->

        </ul>
            <!----------------Create search bar----------------->
            <div class="search-box">
                <form action="FoodSearch.php" method="POST">
                    <input type="search" name="search" placeholder="Search..."  class="search-input" required>
                    <!-- <input type="submit" name="submit" value="search"  class="btn-delete" required> -->
                    <i class="fa-solid fa-magnifying-glass"></i> 
                </form>
            </div> <!----Search bar close----->

        

    <!----------Add to Cart Section-------------->
        <!-- <div class="cartTab">
                <h1>Shopping Cart</h1>
                <div class="listCart">Show items here</div>
                <div class="btn">
                    <button class="close">CLOSE</button>
                    <button class="checkOut">CHECK OUT</button>
                </div>
        </div> -->
    <!----------Add to Cart Function-------------->
        <script src="../assets/js/cart.js"></script>

    
</div>

<div class="parallax">
    <div class="page-title">Superland Store</div>
</div>



<!------------------Home Page Begins----------------->
<br>





<!--------------------DEALS Begin-------------------->
<div class="parallax">
    <div class="title">Deals</div>
</div>
<!------------------DEALS slides open---------------->
<section class="slideshow-container" >                  

    <div class="mySlides fade">                         
        <img src="../assets/images/dashboard/Slide01.png" alt="image one" width="100%">
        
    </div>

    <div class="mySlides fade">
        <img src="../assets/images/dashboard/Slide04.jpg" alt="image two" width="100%">
       
    </div>

    <div class="mySlides fade">
        <img src="../assets/images/dashboard/Slide03.jpg" alt="image one" width="100%">
        
    </div>

    <div class="mySlides fade">
        <img src="../assets/images/dashboard/Slide02.png" alt="image one" width="100%">

    </div>

</section>


<!------------------DEALS Slides Function---------------->
    <script>
            let slideIndex = 0;
    showSlides();
    function showSlides()
    {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++)
    {
    slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length)
    {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 6000); //Change image every 2 seconds
    }
    </script>
<!----Deals Slides Ends---------------->





<!-------------SHOP BY CATEGORIES open-------------->
<div class="parallax">
    <div class="title">Fruits</div>
</div> 

<!-------------SHOP BY CATEGORIES containers open------------>
<section class="categories-containers" id="categories-containers">
    <?php
        $con = db_connect();
        if (!$con) {
            die("Sorry, you can't connect into the database.");
        }
        $sql = "SELECT * FROM `tblproduct` WHERE category LIKE'Fruits%'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0) {
        ?>

<!-------------PRODUCT section start----------------->
<div class="product" id="fruits">
    <div class="container"> 
    
        <?php
        while($row = mysqli_fetch_assoc($res)){
                
        ?>
        <!--item 01-->
        <div class="categories">
        <form action="" method="post">
    
            <div class="image-title-p"><?php echo $row["productName"]; ?></div>
            <img src="../<?php echo $row["imagePath"] ?>" class="item-image-p"/>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">Rs <?php echo $row["price"]; ?>.00</div>
            <div class="quantity">
                <span>Quantity : </span>
                <input type="number" name="quantity" min="1" max="1000" value="1">
                <span>Kg</span>
            </div>
            
            <input type="hidden" name="productName" value="<?php echo $row["productName"]; ?>">
            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
            <input type="hidden" name="imagePath" value="<?php echo $row["imagePath"] ?>">
            <input type="submit" class="btn" value="add" name="add_to_cart">
        </form>
        </div>

        <?php
          }
        ?>
    </div>
</div>
<?php
    }       
?>

<!-------------SHOP BY CATEGORIES open-------------->
<div class="parallax">
    <div class="title">Vegetables</div>
</div> 

<!-------------SHOP BY CATEGORIES containers open------------>
<section class="categories-containers" id="categories-containers">
    <?php
        $con = db_connect();
        if (!$con) {
            die("Sorry, you can't connect into the database.");
        }
        $sql = "SELECT * FROM `tblproduct` WHERE category LIKE'Vegetables%'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0) {
        ?>

<!-------------PRODUCT section start----------------->
<div class="product" id="vegetables">
    <div class="container"> 
    
        <?php
        while($row = mysqli_fetch_assoc($res)){
                
        ?>
        <!--item 01-->
        <div class="categories">
        <form action="" method="post">
    
            <div class="image-title-p"><?php echo $row["productName"]; ?></div>
            <img src="../<?php echo $row["imagePath"] ?>" class="item-image-p"/>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">Rs <?php echo $row["price"]; ?>.00</div>
            <div class="quantity">
                <span>Quantity : </span>
                <input type="number" name="quantity" min="1" max="1000" value="1">
                <span>Kg</span>
            </div>
            
            <input type="hidden" name="productName" value="<?php echo $row["productName"]; ?>">
            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
            <input type="hidden" name="imagePath" value="<?php echo $row["imagePath"] ?>">
            <input type="submit" class="btn" value="add" name="add_to_cart">
        </form>
        </div>

        <?php
          }
        ?>
    </div>
</div>
<?php
    }       
?>




<!-------------SHOP BY CATEGORIES open-------------->
<div class="parallax">
    <div class="title">Meats</div>
</div> 

<!-------------SHOP BY CATEGORIES containers open------------>
<section class="categories-containers" id="categories-containers">
    <?php
        $con = db_connect();
        if (!$con) {
            die("Sorry, you can't connect into the database.");
        }
        $sql = "SELECT * FROM `tblproduct` WHERE category LIKE'Meats%'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0) {
        ?>

<!-------------PRODUCT section start----------------->
<div class="product" id="meats">
    <div class="container"> 
    
        <?php
        while($row = mysqli_fetch_assoc($res)){
                
        ?>
        <!--item 01-->
        <div class="categories">
        <form action="" method="post">
    
            <div class="image-title-p"><?php echo $row["productName"]; ?></div>
            <img src="../<?php echo $row["imagePath"] ?>" class="item-image-p"/>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">Rs <?php echo $row["price"]; ?>.00</div>
            <div class="quantity">
                <span>Quantity : </span>
                <input type="number" name="quantity" min="1" max="1000" value="1">
                <span>Kg</span>
            </div>
            
            <input type="hidden" name="productName" value="<?php echo $row["productName"]; ?>">
            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
            <input type="hidden" name="imagePath" value="<?php echo $row["imagePath"] ?>">
            <input type="submit" class="btn" value="add" name="add_to_cart">
        </form>
        </div>

        <?php
          }
        ?>
    </div>
</div>
<?php
    }       
?>


<!-------------SHOP BY CATEGORIES open-------------->
<div class="parallax">
    <div class="title">Fish</div>
</div> 

<!-------------SHOP BY CATEGORIES containers open------------>
<section class="categories-containers" id="categories-containers">
    <?php
        $con = db_connect();
        if (!$con) {
            die("Sorry, you can't connect into the database.");
        }
        $sql = "SELECT * FROM `tblproduct` WHERE category LIKE'Fish%'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0) {
        ?>

<!-------------PRODUCT section start----------------->
<div class="product" id="fish">
    <div class="container"> 
    
        <?php
        while($row = mysqli_fetch_assoc($res)){
                
        ?>
        <!--item 01-->
        <div class="categories">
        <form action="" method="post">
    
            <div class="image-title-p"><?php echo $row["productName"]; ?></div>
            <img src="../<?php echo $row["imagePath"] ?>" class="item-image-p"/>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">Rs <?php echo $row["price"]; ?>.00</div>
            <div class="quantity">
                <span>Quantity : </span>
                <input type="number" name="quantity" min="1" max="1000" value="1">
                <span>Kg</span>
            </div>
            
            <input type="hidden" name="productName" value="<?php echo $row["productName"]; ?>">
            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
            <input type="hidden" name="imagePath" value="<?php echo $row["imagePath"] ?>">
            <input type="submit" class="btn" value="add" name="add_to_cart">
        </form>
        </div>

        <?php
          }
        ?>
    </div>
</div>
<?php
    }       
?>






<!---------------------Information Updating Section------------------->
<footer>
    
   <div class="container wrap">
        <div class="row">

            <div class="column">
                <div class="footer-widget information-widget ">
                    <h3 class="width-title"> About </h3>
                    <ul>
                        <li><a href="../about.php">About us</a></li>
                        <li><a href="../contact.php">Contact us</a></li>
                        <li><a href="../terms.php">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>      
                    </ul>

                    <div class="card-widget ">
                        <h3>Payment Methods</h3>
                        <div class="cards">
                            <i class="fa-brands fa-cc-visa"></i>
                            <i class="fa-brands fa-cc-mastercard"></i>
                            <i class="fa-brands fa-cc-paypal"></i>
                            <i class="fa-brands fa-cc-amex"></i>
                        </div>
                        <p><span><i class="fa-solid fa-file-shield"></i></span>Secure Online Payment</p>
                    </div>

                </div>
            </div>


            <div class="column">
                <div class="footer-widget categories-widget">
                    <h3 class="width-title"> Quik Links </h3>
                    <ul>
                        <li><a href="../index.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
                        <li><a href="#product"><i class="fa-solid fa-store"></i> Store</a></li>
                        <li><a href="Login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>                       
                    </ul>
                </div>
            </div>


            <div class="column">
                <div class="footer-widget newsletter-widget">
                    <h3 class="width-title"> Newsletter </h3>
                    <p> Subscribe Us For Latest Updates </p>
                    <input type="email" placeholder="Your Email..." class="email">
                    <input type="submit" value="Subscribe" class="btn">
                </div>
            </div>


 

            <div class="column">
                <div class="footer-widget contact-widget ">
                    <h3 class="width-title"> Contact Info </h3>
                    <ul>
                        <li><a href="#" class="link"><i class="fa-solid fa-phone-flip"></i> +94 110 223 556</a></li>
                        <li><a href="#" class="link"><i class="fa-solid fa-mobile"></i> +94 760 223 556</a></li>
                        <li><a href="#" class="link"><i class="fa-solid fa-envelope"></i> superlandstore@gmail.com</a></li>
                        <li><a href="#" class="link"><i class="fa-solid fa-location-dot"></i> No:148, Galle Road, Sri Lanka</a></li>

                    </ul>


                    <div class="social-widget ">
                        <h3> Follow Us </h3>
                        <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></i></a>
                        <a href="#"><i class="fa-brands fa-square-youtube"></i></a>
                    </div>

                </div>
            </div>



        </div> 
   </div>


</footer>

</section>

  
</body>
</html>