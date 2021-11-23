<?php include "../includes/db.php"?>
<?php 
session_start();

?>


<?php 
if(isset($_POST['submit'])){
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    
    $email_search = "select * from users where email = '$email' ";
    $result = mysqli_query($link,$email_search);
    $email_count = mysqli_num_rows($result);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($result);
       
        $_SESSION['name'] = $email_pass['name'];
        $_SESSION['mobile'] = $email_pass['mobile'];
        $_SESSION['address'] = $email_pass['address'];
        

        $db_pass = $email_pass['password'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
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