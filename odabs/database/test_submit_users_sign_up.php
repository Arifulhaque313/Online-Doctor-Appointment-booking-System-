<?php

  include"../includes/db.php";

  if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($link,$_POST['name']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $cpassword = mysqli_real_escape_string($link,$_POST['cpassword']);
    $mobile = mysqli_real_escape_string($link,$_POST['mobile']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $role = mysqli_real_escape_string($link,$_POST['role']);

  
   
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
   

    $pass = password_hash ($password, PASSWORD_BCRYPT);
    $cpass = password_hash ($cpassword, PASSWORD_BCRYPT);


    $email_query = "select * from testusers where email = '$email'";
    $email_result = mysqli_query($link,$email_query);
    $email_count = mysqli_num_rows($email_result);


    if($email_count>0){
      ?>
      <script>
        alert("Email already exist")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  

    }

    elseif(!preg_match ($pattern, $email) ){
      ?>
      <script>
        alert("Email Is invalid")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  

    }

    elseif(strlen ($password) < 7){
      ?>
      <script>
        alert("Password should be more than 7")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  

    }

    elseif($password != $cpassword){
      ?>
      <script>
        alert("Password are not matching")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  

    }

  

    elseif(!preg_match ("/^[0-9]*$/", $mobile)){
      ?>
      <script>
        alert("Please insert valid mobile number")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  
    }

    elseif(strlen ($mobileno) != 11){
      ?>
      <script>
        alert("Mobile number should 11 digit")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  
    }

    elseif(strlen ($address) < 12){
      ?>
      <script>
        alert("Please insert details address")
        window.location.href="../login/test_users_sign_up.php";
      </script>
      <?php  
    }


    else{
      $query="insert into testusers(name, email, password, cpassword, mobile, address, role) values('$name','$email','$pass','$cpass','$mobile','$address','$role')";
    mysqli_query($link,$query);
    }


  }

?>  

<script>
    alert("Registration successful");
    window.location.href="../login/login.php";
</script>



