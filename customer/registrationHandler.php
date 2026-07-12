<?php
require_once __DIR__ . '/../config/db.php';

    if (isset($_POST["btnRegister"])) {
        $name = $_POST["txtName"];
        $email = $_POST["txtEmail"];
        $password =  $_POST["txtPassword"];
        $cpass = $_POST["cpassword"];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = __DIR__ . '/../uploads/users/' . $image;

        $con = db_connect();

        if (!$con) {
            die("Sorry, you can't connect into the database.");
        }

        $select = mysqli_query($con, "SELECT * FROM `tbluser` WHERE email = '$email' AND password = '$password'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            $message[] = 'user already exist'; 
        }else{
            if($password != $cpass){
                $message[] = 'confirm password not matched!';
            }elseif($image_size > 2000000){
                $message[] = 'image size is too large!';
            }else{
                $insert = mysqli_query($con, "INSERT INTO `tbluser`(`username`, `email`, `password`, `image`) VALUES('$name', '$email', '$password', '$image')") or die('query failed');

                if($insert){
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'registered successfully!';
                    header('location:Login.php');
                }else{
                    $message[] = 'registeration failed!';
                }
            }
        }

        
    }

?>
