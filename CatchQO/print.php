<?php
include('admin_session.php');
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events By CatchQO || Print Report</title>

    <link rel = "shortcut icon" href = 
    "./assets/img/logo-1-_white_-circle.ico"  
    type = "image/x-icon">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link rel="stylesheet" href="./assets/css/print.css" />
    <script src="./assets/js/jquery-3.7.1.js"></script>

  </head>
  <body>

    <section class="transaction-history">
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Transaction History:</h1>
          </div>
          <img src="./assets/img/logo-1 (white no-bg).png" alt="Logo" style="width: 10%; display: flex;">
        </div>

        
        <div class="table-data">
          <div class="order">
            <table>
              <thead>
                <tr>
                  <th>User</th>
                  <th>Event Type</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Event Location</th>
                  <th>Payment Method</th>
                  <th>Amount Paid</th>
                </tr>
              </thead>
              <?php
                  $userID = $_SESSION['userID'];

                  $eventId = '';
                  $sql = "SELECT e.*, p.amountPaid, p.paymentMethod, u.username
                  FROM event as e 
                  LEFT JOIN booking
                  ON e.eventID = booking.eventID
                  LEFT JOIN payment p
                  on p.bookingID = booking.bookingID
                  LEFT JOIN user u
                  on u.userID = booking.userID
                  order by e.eventId desc";

                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                    $username = $row['username'];
                    $eventType = $row['eventType'];
                    $eventDate = $row['eventDate'];
                    $eventTime = $row['eventTime'];
                    $eventLocation = $row['eventLocation'];
                    $paymentMethod = $row['paymentMethod'];
                    $amountPaid = $row['amountPaid'];
                    echo "
                        <tr>
                          <td>$username</td>
                          <td>$eventType</td>
                          <td>$eventDate</td>
                          <td>$eventTime</td>
                          <td>$eventLocation</td>
                          <td>$paymentMethod</td>
                          <td>$amountPaid</td>
                        </tr>
                
                    ";
                  }
                  $conn->close();
                ?>
            </table>
          </div>

      </main>
    </section>



    <script>
      function PrintPage(){
        window.print();
      }
      window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function(){ window.close() }, 750)
      });
    </script>

    <script src="./assets/js/admin.js"></script>
  </body>
<?php
include('admin_session.php');
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events By CatchQO || Print Report</title>

    <link rel = "shortcut icon" href = 
    "./assets/img/logo-1-_white_-circle.ico"  
    type = "image/x-icon">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link rel="stylesheet" href="./assets/css/print.css" />
    <script src="./assets/js/jquery-3.7.1.js"></script>

  </head>
  <body>

    <section class="transaction-history">
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Transaction History:</h1>
          </div>
          <img src="./assets/img/logo-1 (white no-bg).png" alt="Logo" style="width: 10%; display: flex;">
        </div>

        
        <div class="table-data">
          <div class="order">
            <table>
              <thead>
                <tr>
                  <th>User</th>
                  <th>Event Type</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Event Location</th>
                  <th>Payment Method</th>
                  <th>Amount Paid</th>
                </tr>
              </thead>
              <?php
                  $userID = $_SESSION['userID'];

                  $eventId = '';
                  $sql = "SELECT e.*, p.amountPaid, p.paymentMethod, u.username
                  FROM event as e 
                  LEFT JOIN booking
                  ON e.eventID = booking.eventID
                  LEFT JOIN payment p
                  on p.bookingID = booking.bookingID
                  LEFT JOIN user u
                  on u.userID = booking.userID
                  order by e.eventId desc";

                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                    $username = $row['username'];
                    $eventType = $row['eventType'];
                    $eventDate = $row['eventDate'];
                    $eventTime = $row['eventTime'];
                    $eventLocation = $row['eventLocation'];
                    $paymentMethod = $row['paymentMethod'];
                    $amountPaid = $row['amountPaid'];
                    echo "
                        <tr>
                          <td>$username</td>
                          <td>$eventType</td>
                          <td>$eventDate</td>
                          <td>$eventTime</td>
                          <td>$eventLocation</td>
                          <td>$paymentMethod</td>
                          <td>$amountPaid</td>
                        </tr>
                
                    ";
                  }
                  $conn->close();
                ?>
            </table>
          </div>

      </main>
    </section>



    <script>
      function PrintPage(){
        window.print();
      }
      window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function(){ window.close() }, 750)
      });
    </script>

    <script src="./assets/js/admin.js"></script>
  </body>
</html>