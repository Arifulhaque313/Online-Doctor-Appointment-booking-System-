<?php include "../includes/db.php"?>
<?php 
session_start();

?>


<?php 
if(isset($_POST['submit'])){
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $role = ($_POST['role']);


    echo gettype($role);

    /*
    $email_search = "select * from testusers where email = '$email' ";
    $result = mysqli_query($link,$email_search);
    $email_count = mysqli_num_rows($result);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($result);
       
        $_SESSION['name'] = $email_pass['name'];
        $_SESSION['mobile'] = $email_pass['mobile'];
        $_SESSION['address'] = $email_pass['address'];
        $_SESSION['role'] = $email_pass['role'];

        $user ="user";
        $admin="admin";
        $doctor="doctor";
        $superadmin="superadmin";
        

        $db_pass = $email_pass['password'];
        $db_role = $email_pass['role'];

        

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            ?>
            <script>

              
            </script>

            <?php


            
            if($admin == $role){
                ?>
                <script>
    
                    alert("Login successfull");
                    window.location.href="../dashboards/admin_dashboard.php";
                </script>
    
                <?php
            }

            elseif($user == $role){
                ?>
                <script>
    
                    alert("Login successfull");
                    window.location.href="../dashboards/user_dashboard.php";
                </script>
    
                <?php
            }


            else{
                ?>
                <script>
    
                    alert("Invalid");
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


 */  

}
 

?>