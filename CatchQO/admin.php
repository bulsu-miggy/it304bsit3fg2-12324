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
    <title>Events By CatchQO || Admin Panel</title>

    <link rel = "shortcut icon" href = 
    "./assets/img/logo-1-_white_-circle.ico"  
    type = "image/x-icon">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link rel="stylesheet" href="./assets/css/admin.css" />
    <script src="./assets/js/jquery-3.7.1.js"></script>
    <script>
        $( "#user" ).on( "click", function() {

        });

        $( "#transaction-history" ).on( "click", function() {
          $(".user").hide();
          $(".transaction-history").show();

        });
        $(document).on('click', '#user', function (e) {
          $(".user").show();
          $(".transaction-history").hide();
        });
        $(document).on('click', '#transaction-history', function (e) {
          $(".user").hide();
          $(".transaction-history").show();
        });
    </script>
  </head>
  <body>
    <section class="sidebar">
      <a href="#" class="logo">
        <i class="fa fa-lock"></i>
        <span class="text">Admin Panel</span>
      </a>

      <ul class="side-menu top">
        <nav>
          <i class="fas fa-bars menu-btn"></i>
        </nav>
        <li class="active">
          <a href="#" class="nav-link" id="user">
            <i class="fa fa-user"></i>
            <span class="text">Users</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link" id="transaction-history">
            <i class="fa fa-history"></i>
            <span class="text">Transaction History</span>
          </a>
        </li>
        <li>
          <a href="./index.php" class="nav-link">
          <i class="fa fa-sign-out"></i>
            <span class="text">Log Out</span>
          </a>
        </li>
      </ul>
    </section>

    <section class="user">

      <main>
        <div class="head-title">
          <div class="left">
            <h1>Users:</h1>
          </div>
        </div>

        
        <div class="table-data">
          <div class="order">
            <table>
              <thead>
                <tr>
                  <th>User</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Admin User</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $userID = $_SESSION['userID'];

                  $eventId = '';
                  $sql = "SELECT username, email, contactNum, isAdmin FROM user";

                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                    $username = $row['username'];
                    $email = $row['email'];
                    $phone = $row['contactNum'];
                    $isAdmin = $row['isAdmin'];
                    echo "
                        <tr>
                          <td>$username</td>
                          <td>$email</td>
                          <td>$phone</td>
                          <td>$isAdmin</td>
                        </tr>
                    ";
                  }

                ?>
                <tbody> 
            </table>
          </div>

      </main>
    </section>

    <section class="transaction-history">
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Transaction History:</h1>
          </div>
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
      <button class="button-3">Print Report</button>
    </section>



    <script>
      let sideMenu = document.querySelectorAll(".nav-link");
      sideMenu.forEach((item) => {
        let li = item.parentElement;

        item.addEventListener("click", () => {
          sideMenu.forEach((link) => {
            link.parentElement.classList.remove("active");
          });
          li.classList.add("active");
        });
      });

      let menuBar = document.querySelector(".menu-btn");
      let sideBar = document.querySelector(".sidebar");
      menuBar.addEventListener("click", () => {
        sideBar.classList.toggle("hide");
      });
    </script>

    <script src="./assets/js/admin.js"></script>
  </body>
</html>
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
    <title>Events By CatchQO || Admin Panel</title>

    <link rel = "shortcut icon" href = 
    "./assets/img/logo-1-_white_-circle.ico"  
    type = "image/x-icon">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link rel="stylesheet" href="./assets/css/admin.css" />
    <script src="./assets/js/jquery-3.7.1.js"></script>
    <script>
        $( "#user" ).on( "click", function() {

        });

        $( "#transaction-history" ).on( "click", function() {
          $(".user").hide();
          $(".transaction-history").show();

        });
        $(document).on('click', '#user', function (e) {
          $(".user").show();
          $(".transaction-history").hide();
        });
        $(document).on('click', '#transaction-history', function (e) {
          $(".user").hide();
          $(".transaction-history").show();
        });
    </script>
  </head>
  <body>
    <section class="sidebar">
      <a href="#" class="logo">
        <i class="fa fa-lock"></i>
        <span class="text">Admin Panel</span>
      </a>

      <ul class="side-menu top">
        <nav>
          <i class="fas fa-bars menu-btn"></i>
        </nav>
        <li class="active">
          <a href="#" class="nav-link" id="user">
            <i class="fa fa-user"></i>
            <span class="text">Users</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link" id="transaction-history">
            <i class="fa fa-history"></i>
            <span class="text">Transaction History</span>
          </a>
        </li>
        <li>
          <a href="./index.php" class="nav-link">
          <i class="fa fa-sign-out"></i>
            <span class="text">Log Out</span>
          </a>
        </li>
      </ul>
    </section>

    <section class="user">

      <main>
        <div class="head-title">
          <div class="left">
            <h1>Users:</h1>
          </div>
        </div>

        
        <div class="table-data">
          <div class="order">
            <table>
              <thead>
                <tr>
                  <th>User</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Admin User</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $userID = $_SESSION['userID'];

                  $eventId = '';
                  $sql = "SELECT username, email, contactNum, isAdmin FROM user";

                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                    $username = $row['username'];
                    $email = $row['email'];
                    $phone = $row['contactNum'];
                    $isAdmin = $row['isAdmin'];
                    echo "
                        <tr>
                          <td>$username</td>
                          <td>$email</td>
                          <td>$phone</td>
                          <td>$isAdmin</td>
                        </tr>
                    ";
                  }

                ?>
                <tbody> 
            </table>
          </div>

      </main>
    </section>

    <section class="transaction-history">
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Transaction History:</h1>
          </div>
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
            <a href="./print.php"><button class="btn-3" style="
              background-color: #2ea44f;
              border: 1px solid rgba(27, 31, 35, .15);
              border-radius: 6px;
              box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
              color: #fff;
              cursor: pointer;
              font-family: 'Poppins', sans-serif;
              font-size: 14px;
              font-weight: 600;
              width: 100%;
              padding: 6px 16px;
              position: relative;
              text-align: center;
              top: 10px;" id="PrintButton" onclick="PrintPage()">Print Report</button>
            </a>
          </div>

      </main>
    </section>

    <script src="./assets/js/admin.js"></script>
  </body>
</html>
