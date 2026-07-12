
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Laila:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <!--Link font awesome to html page-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">

    </script>


    <script>
        function stickyMenu (){
            var sticky=document.getElementById('sticky');
            if (!sticky) {
                return;
            }
            if (window.pageYOffset>220){
                sticky.classList.add('sticky');
            }
            else {
                sticky.classList.remove('sticky');
            }
        }
        window.onscroll=function(){
            stickyMenu();
        }
    </script>


</head>

<body>

    
    <div class="menu" id="sticky">
        <ul class="menu-ul">
            <a href="../index.php"><li class="a-menu"><i class="fa-solid fa-house-user"></i> Home</li></a>



    
</div>

<div class="parallax">
    <div class="page-title">Superland Store</div>
</div>


<div class="login-page" enctype="multipart/form-data"> <!--form-container-->
        <form action="loginHandler.php" method="POST" class="login-form" enctype="multipart/form-data">
            <h2><span class="number">Login</span></h2>
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            ?>
            <div class="input-box">
                <input type="email" name="txtEmail" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" name="txtPassword" id="txtPassword" placeholder="password" required>
            </div>
            <button type="submit" name="btnSubmit" >Login</button>
    
            <p class="message">Don't have an account ? <a href="#">Register now</a></p>
        </form>

        
   
    <form action="registrationHandler.php" method="POST" enctype="multipart/form-data" class="registration-form">
        <h2><span class="number">New Registration</span></h2>
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">'.$msg.'</div>';
            }
        }
        ?>
        <div class="input-box">
            <input type="text" name="txtName"  placeholder="Username" required>
        </div>
        <div class="input-box">
            <input type="email" name="txtEmail" id="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" name="txtPassword" id="password" placeholder="Password" required>
        </div>
        <div class="input-box">
            <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
        </div>
        <div class="input-box">
            <input type="file" name="image" id="image" class="box" accept="image/jpg, image/jpeg, image/png" required>
        </div>
        <button type="submit" name="btnRegister">Register</button>
        <p class="message">Already have an account? <a href="#">Sign in</a></p>
    </form>
</div>
    
    <script src="../assets/js/login.js"></script>
</body>

</html>