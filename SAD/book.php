<?php 
if(isset($_GET['date'])){
    $date= $_GET['date'];
}
if(isset($_POST['submit'])){
    $fname=$_POST['FIRSTNAME'];
    $mname=$_POST['MIDDLENAME'];
    $lname=$_POST['LASTNAME'];
    $phone=$_POST['PHONE'];
    $email=$_POST['EMAIL'];

    $conn= new mysqli('localhost','root','','sad');

    $sql = "INSERT INTO bookings_record(FIRSTNAME,MIDDLENAME,LASTNAME, PHONE, EMAIL, DATE) " .
    "VALUES ('$fname','$mname','$lname','$phone','$email','$date')";
   if($conn ->query($sql)){
    $message= "div<class='alert alert-success'>BOOKING SUCCESSFULL</div>";
   }else{
    $message= "div<class='alert alert-danger'>BOOKING WAS NOT SUCCESSFULL</div>";
   }


}

?>





<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        /* Your CSS styles here */
    </style>
    <title>Online Booking Calendar</title>
</head>
<body>
      <div class="container">
        <h1 class="text-center alert-alert-danger" style="background:#2ecc71; border:none; color:#fff">Book a Date</h1>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($message)?$message:'';?>
                <form action="" method="POST" autoccomplet="off">
                    <div class="form-group">
                        <label for="">Firstname</label>
                        <input type="text" class="form-control" name="FIRSTNAME" required>
                    </div>
                    <div class="form-group">
                        <label for="">Middle Name</label>
                        <input type="text" class="form-control" name="MIDDLENAME" required>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="LASTNAME" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="PHONE" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="EMAIL" required>
                    </div>
                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                 <a href="index2.php" class="btn btn-success"  >Back</a>
                </form>
            </div>
        </div>
      </div>
</body>
</html>