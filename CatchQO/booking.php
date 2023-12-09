<?php 
  ob_start();
include "config.php";
include "session.php";

try{
    $userID = $_SESSION['userID'];
    //event saving
    $eventType = $_POST['eventType'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $eventLocation = $_POST['eventLocation'];

    $eventId = '';
    $sql = "INSERT INTO `event`(`eventType`, `eventDate`, `eventTime`, `eventLocation`) 
          VALUES ('$eventType', '$eventDate','$eventTime', '$eventLocation')";
    if ($conn->query($sql) === TRUE) {
      $eventId = $conn->insert_id;

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
<<<<<<< HEAD

=======
    
>>>>>>> 00f0f14a0ce15d7a7072ccb0c2cb7599ef3bcab7

    //booking saving
    $sql = "INSERT INTO `booking`(`userID`, `eventID`) 
        VALUES ('$userID', '$eventId')";
    if ($conn->query($sql) === TRUE) {
    $bookingID = $conn->insert_id;

    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $paymentMethod = $_POST['paymentMethod'];

    if($paymentMethod == 'paypal'){
      $mobileNumber = $_POST['mobileNumber'];
      $paypalAmount = $_POST['paypalAmount'];

  
      $sql = "INSERT INTO `payment`(`paymentMethod`, `amountPaid`, `paypalNumber`,`bookingID`) 
            VALUES ('$paymentMethod', '$paypalAmount', '$mobileNumber', $bookingID)";
      if ($conn->query($sql) === TRUE) {
        $paymentId = $conn->insert_id;

  
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    if($paymentMethod == 'credit'){
      $creditNumber = md5($_POST['creditNumber']);
      $creditAmount = $_POST['creditAmount'];
      $creditExpire = md5($_POST['creditExpire']);
      $creditCVV = md5($_POST['creditCVV']);
      $creditNumber = $_POST['creditNumber'];
      $creditAmount = $_POST['creditAmount'];
      $creditExpire = $_POST['creditExpire'];
      $creditCVV = $_POST['creditCVV'];

      $sql = "INSERT INTO `payment`(`paymentMethod`, `amountPaid`,`bookingID`, `creditNumber`, `creditValidity`, `creditCVV`) 
            VALUES ('$paymentMethod', '$creditAmount', $bookingID, '$creditNumber', '$creditExpire', '$creditCVV')";
      if ($conn->query($sql) === TRUE) {
        $paymentId = $conn->insert_id;

  
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();
    // header('Location: http://localhost:8001/home.php');
    // http://localhost:8001/?registered=true
    die('success');
}
catch(Exception $e ) {
  die('error');
}
?>
?> 
