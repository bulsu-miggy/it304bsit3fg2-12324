<?php
    $licenseno = "";
    $plateno = "";
    $name = "";
    $contact = "";
    $dateofap = "";
    $timeofap = "";
    $email = "";


    $errorMessage = "";
    $successMessage = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sad";

    //connection
    $connection = new mysqli($servername,$username,$password,$database);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $licenseno = $_POST ["license_number"];
        $plateno = $_POST ["plate_number"];
        $name = $_POST ["full_name"];
        $contact = $_POST ["contact"];
        $dateofap = $_POST ["doa"];
        $timeofap = $_POST ["toa"];
        $email = $_POST ["email"];
    }

    do {
        if(empty($licenseno) || empty($plateno) || empty($name) || empty($contact) || empty($dateofap) || empty($timeofap)  || empty($email)){
            $errorMessage = "all fields are required!";
            break;
        }
        

        //add or insert to database
        $sql = "INSERT INTO customer(license_number,plate_number,full_name, contact, doa, toa, email) " .
        "VALUES ('$licenseno','$plateno','$name','$contact','$dateofap','$timeofap','$email')";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }
        
        echo "sawaws";
        $successMessage = "users Added successfully!";
        header("location: /SAD/home.php");
        sleep(.5);
        exit;
        
    } while(false);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="Styles.css">
    <title>Appointment</title>
</head>
<body>
  
     
   <div class="container"> 
  <p class="appointment-title"> Appointment</p>
    <form method = "post" class="appointment-form" action = "Appointment.php">
 
      <label for="liscense-number">    LICENSE NUMBER  </br>
      <input type="text"  name = "license_number" id="license_number" value = "<?php echo $licenseno;?>">   </br>
    </label> 

    <label for="plate">  PLATE NUMBER</br>
        <input type="text"  name = "plate_number" id="plate_number" value = "<?php echo $plateno;?>">  </br>

      </label>  

      <label for="name">  FULL NAME</br>
        <input type="text" name = "full_name" id="full_name" value = "<?php echo $name;?>">  </br> 

        <label for="email">  EMAIL</br>
<input type="email" name = "email" id="email" value = "<?php echo $email;?>">  </br>
</label> 
 
      <label for="contact">  CONTACT</br>
        <input type="tel" name = "contact" id="contact" value = "<?php echo $contact;?>">   </br> 

      </label>  
      
      <label for="dap ">  DATE OF APPOINTMENT</br>
        <input type="date" name = "doa" id="doa" value = "<?php echo $dateofap;?>">   </br> 

      </label>   
      <label for="time"> TIME </br>
        <input type="time" name = "toa" id="toa" value = "<?php echo $timeofap;?>">  </br>
         </label>
       

        <input type="Submit" id="submit" >
     

    </form>     


   </div>


   
</body>
</html>