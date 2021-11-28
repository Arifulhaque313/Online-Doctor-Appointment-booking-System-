<?php session_start(); ?>

<?php include "includes/db.php"; ?>
<?php 



$query= "select * from hospital";
$result =mysqli_query($link,$query);
?>




<?php 
  include "includes/header.php"
?>


<!--Hospital Section-->
<section class="container-fluid bg-light py-3">


    <div class="container my-4 ">
        <h1 class="text-center " style="color:#089D49;">Hospitals list</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php
        while($row = mysqli_fetch_assoc($result)){

              $hname = $row['hname'];
              $hemail = $row['email'];
              $hmobile = $row['mobile'];
              $haddress = $row['address'];
              $hdoctor = $row['viewdoctor'];
              $himage = $row['himage'];

          	?>
            <div class="col-4">
                <div class="card">

                    <img src="<?php echo $himage; ?>" height="300" class="card-img-top" alt="Hospital Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $hname; ?></h5>

                        <p class="card-text"><span class="las la-envelope"></span> <span><b>Email :
                                </b><?php echo $hemail; ?></span></p>
                        <p class="card-text"><span class="las la-phone"></span> <span><b>Mobile :
                                </b> <?php echo $hmobile; ?></span></p>
                        <p class="card-text"><span class="las la-location-arrow"></span> <span><b>Address :
                                </b> <?php echo $haddress; ?></span></p>

                        <a href="<?php echo $hdoctor; ?>"><button class="btn btn-primary">View doctors</button></a>
                    </div>
                </div>
            </div>

            <?php
    }

    ?>







        </div>


    </div>

</section>










<?php 
  include "includes/footer.php"
?>