<?php

  include"../includes/db.php";

  if(isset($_POST['submit'])){

    $hname = mysqli_real_escape_string($link,$_POST['hname']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $mobile = mysqli_real_escape_string($link,$_POST['mobile']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $viewdoctor = mysqli_real_escape_string($link,$_POST['viewdoctor']);
    
    $filename = $_FILES["himage"]["name"];
    $tempname = $_FILES["himage"]["tmp_name"];
    $folder = "../img/himage/".$filename;
    move_uploaded_file($tempname,$folder);

  
   
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  


    $email_query = "select * from testusers where email = '$email'";
    $email_result = mysqli_query($link,$email_query);
    $email_count = mysqli_num_rows($email_result);


    if($email_count>0){
      ?>
      <script>
        alert("Email already exist")
        window.location.href="../login/add_hospital_sign_up.php";
      </script>
      <?php  

    }

    elseif(!preg_match ($pattern, $email) ){
      ?>
      <script>
        alert("Email Is invalid")
        window.location.href="../login/add_hospital_sign_up.php";
      </script>
      <?php  

    }


    elseif(!preg_match ("/^[0-9]*$/", $mobile)){
      ?>
      <script>
        alert("Please insert valid mobile number")
        window.location.href="../login/add_hospital_sign_up.php";
      </script>
      <?php  
    }

    elseif(strlen ($mobile) != 11){
      ?>
      <script>
        alert("Mobile number should be 11 digit")
        window.location.href="../login/add_hospital_sign_up.php";
      </script>
      <?php  
    }

    elseif(strlen ($address) < 12){
      ?>
      <script>
        alert("Please insert details address")
        window.location.href="../login/add_hospital_sign_up.php";
      </script>
      <?php  
    }


    else{
      $query="insert into hospital(hname, email, mobile, address,viewdoctor, himage) values('$hname','$email','$mobile','$address','$viewdoctor','$folder')";
    mysqli_query($link,$query);
    }


  }

?>  

<script>
    //alert("Registration successful");
   //window.location.href="";
</script>



