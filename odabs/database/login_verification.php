<?php include "../includes/db.php"?>
<?php 
session_start();

?>


<?php 
if(isset($_POST['submit'])){
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $role = ($_POST['role']);

    

    

    
    $email_search = "select * from testusers where email = '$email' ";
    $result = mysqli_query($link,$email_search);
    $email_count = mysqli_num_rows($result);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($result);
       
        $_SESSION['name'] = $email_pass['name'];
        $_SESSION['mobile'] = $email_pass['mobile'];
        $_SESSION['address'] = $email_pass['address'];
        $_SESSION['role'] = $email_pass['role'];

       
        

        $db_pass = $email_pass['password'];
        $db_role = $email_pass['role'];


        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){


            if($role === "user"){
                ?>
                <script>
    
                    alert("Login successfull");
                    window.location.href="../dashboards/user_dashboard.php";
                </script>
    
                <?php
            }
            elseif($role === "admin"){
                ?>
                <script>
    
                    alert("Login successfull");
                    window.location.href="../dashboards/admin_dashboard.php";
                </script>
    
                <?php
            }

            elseif($role ==="doctor"){
                ?>
                <script>
    
                    alert("Login successfull");
                    window.location.href="../dashboards/doctor_dashboard.php";
                </script>
    
                <?php
            }

            elseif($role === "superadmin"){
                ?>
                <script>
    
                    alert("Login successfull");
                    window.location.href="../dashboards/super_admin_dashboard.php";
                </script>
    
                <?php
            }

           

            else{
                ?>
                <script>
    
                    alert("Invalid Email & password");
                    window.location.href="../login/test_login.php";
                </script>
    
                <?php
            }
            
        }
        else{
            ?>
            <script>

                alert("password Incorrect");
                window.location.href="../login/login.php";
            </script>

            <?php
        }
    }

    else{
        ?>
            <script>

                alert("Email Incorrect");
                window.location.href="../login/login.php";
            </script>

            <?php
    }


    

}

?>