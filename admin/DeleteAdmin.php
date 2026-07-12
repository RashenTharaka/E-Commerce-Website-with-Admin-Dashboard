    <!--Check whether the submit button is clicked or not -->

        <?php
require_once __DIR__ . '/../config/db.php';

                //get the ID of Admin to be deleted
                $id = $_GET['id'];

                //connect to the database
                $con = db_connect(); //selecting database



                //Create SQL Query to Delete Admin
                $sql = "DELETE FROM tbl_admin WHERE `id`=$id ";

                $res = mysqli_query($con,$sql);

                //Execute the quary
                if($res==TRUE)
                {
                    //Query Executed and admin updated
                    $_SESSION['update']="<div class='update'>Successfully Deleted.</div>";
                    header("Location:ManageAdmin.php");
                    
                }
                else
                {
                    $_SESSION['update']="<div class='update'>Deleted Failed.</div>";
                    header("Location:ManageAdmin.php");
                    //Redirect the ManageAdmin page with message
                }

            
        ?>