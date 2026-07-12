    
    <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
    <!--Check whether the submit button is clicked or not -->

    <?php
require_once __DIR__ . '/../config/db.php';
            
            //get the ID of Admin to be deleted
            $productID = $_GET['id'];

            //connect to the database
            $con = db_connect(); //selecting database



            //Create SQL Query to Delete Admin
            $sql = "DELETE FROM tblproduct WHERE `productID`=$productID ";

            $res = mysqli_query($con,$sql);

            //Execute the quary
            if($res==TRUE)
            {
                //Query Executed and admin updated
                $_SESSION['delete']="<div class='success'>Successfully Deleted.</div>";
                header("Location:Products.php");
                
            }
            else
            {
                $_SESSION['delete']="<div class='success'>Deleted Failed.</div>";
                header("Location:Products.php");
                //Redirect the Products.php page with message
            }
        
    ?>

</body>
</html>