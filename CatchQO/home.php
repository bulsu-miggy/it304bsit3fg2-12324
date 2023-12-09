<?php
include('session.php');
include "config.php";
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel = "shortcut icon" href = 
    "./assets/img/logo-1-_white_-circle.ico"  
    type = "image/x-icon">

    <title>Events by CATCHQO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="./assets/js/jquery-3.7.1.js"></script>
    <script src="./assets/js/jquery-3.7.1.js"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
    <header class="header">
      <a href="#" class="logo">Event by <span>CATCHQO</span></a>

      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#service">service</a>
        <a href="#about">about</a>
        <a href="#gallery">gallery</a>
        <a href="#feedback">Feedback</a>
        <a href="#contact">contact</a>
        <a href="./index.php"><i class='bx bx-log-out' style='color:#faf1e4'  ></i></a>
      </nav>

      <div id="menu-bar" class="fas fa-bars"></div>
    </header>
    
    <div class="payment-container">
      <h1>Payment Method:</h1> <button class="payment-close" onclick="closePayment()">X</button>
      <div class="payment-method">
        <button class="credit-card-btn" onclick="openCreditCard()">Credit Card <i class='bx bx-credit-card' style='color:#faf1e4'></i></button>
        <button class="paypal-btn" onclick="openPayPal()">Paypal <i class='bx bxl-paypal' style='color:#faf1e4' ></i></button>
      </div>
      
      <div class="credit-card-container">
        <form class="payment-form" id="payment-form-creditcard" onsubmit="submitBooking(event,'credit')">
      
      <div class="credit-card-container">
        <form class="payment-form" id="payment-form-creditcard" onsubmit="submitBooking(event,'credit')">
          <label for="creditNumber">Credit Number:</label>
          <input type="text" id="creditNumber" placeholder="0000 0000 0000 0000" required>
          <label for="creditExpire">Valid Till:</label>
          <input type="text" id="creditExpire" placeholder="MM/YYYY" required>
          <label for="creditCVV">CVV:</label>
          <input type="text" id="creditCVV" placeholder="000" required>
          <label for="creditAmount">Amount:</label>
          <input type="text" id="creditAmount" placeholder="Amount" required>
          <button type="submit" class="creditPayment">Pay Now</button>
        </form>
      </div>
        </form>
      </div>

      <div class="paypal-container">
        <form class="payment-form" id="payment-form-paypal" onsubmit="submitBooking(event,'paypal')">
      <div class="paypal-container">
        <form class="payment-form" id="payment-form-paypal" onsubmit="submitBooking(event,'paypal')">
          <label for="mobileNumber">Mobile Number:</label>
          <input type="phone" id="mobileNumber" placeholder="Mobile Number" required>
          <label for="paypalAmount">Amount:</label>
          <input type="text" id="paypalAmount" placeholder="Amount" required> 
          <button type="submit" class="paypalPayment">Pay Now</button>
        </form>
      </div>

 
    </div>

    <div class="booking-container" id="booking-container">
      <h1>Booking Event:</h1> <button class="close-booking" onclick="closeBooking()">X</button>
      <form class="event-form" id="event-form" onsubmit="bookEvent(event)" onsubmit="bookEvent(event)">
        <label for="eventType">Event Type:</label>
        <select id="eventType" placeholder="Select event type">
          <option value="">Select event type</option>
          <option value="wedding">Wedding</option>
          <option value="corporate">Corporate</option>
          <option value="christening">Christening</option>
          <option value="birthday">Birthday</option>
        </select>
  
        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" placeholder="Select event date" required>
  
        <label for="eventTime">Event Time:</label>
        <input type="time" id="eventTime" placeholder="Select event time" required>
        
        <label for="eventLocation">Event Location:</label>
        <input type="text" id="eventLocation" placeholder="Enter event location" required>

        <button class="openPayment" >Book Event</button>
        <button class="openPayment" >Book Event</button>
      </form>
        


      <div class="table-container">
        <h1 class="table-title">Transaction History</h1>
        <div class="row">
            <table class="col-xs-7 table-bordered table-striped table-condensed table-fixed">
                <thead>
                    <tr>
                        <th class="col" style='width: 16.667%;'>Event Type</th>
                        <th class="col" style='width: 16.667%;'>Event Date</th>
                        <th class="col" style='width: 16.667%;'>Event Time</th>
                        <th class="col" style='width: 16.667%;'>Event Location</th>
                        <th class="col" style='width: 16.667%;'>Payment Method</th>
                        <th class="col" style='width: 16.667%;'>Amount Paid</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  $userID = $_SESSION['userID'];

                  $eventId = '';
                  $sql = "SELECT e.*, p.amountPaid, p.paymentMethod
                  FROM event as e 
                  LEFT JOIN booking
                  ON e.eventID = booking.eventID
                  LEFT JOIN payment p
                  on p.bookingID = booking.bookingID
                  $sql = "SELECT e.*
                  FROM event as e 
                  LEFT JOIN booking
                  ON e.eventID = booking.eventID
                  where booking.userID = '$userID'
                  order by e.eventId desc";

                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                    $eventType = $row['eventType'];
                    $eventDate = $row['eventDate'];
                    $eventTime = $row['eventTime'];
                    $eventLocation = $row['eventLocation'];
                    $paymentMethod = $row['paymentMethod'];
                    $amountPaid = $row['amountPaid'];
                    echo "
                        <tr>
                            <td class='col' style='width: 16.667%; text-align:center;'>$eventType</td>
                            <td class='col' style='width: 16.667%; text-align:center;'>$eventDate</td>
                            <td class='col' style='width: 16.667%; text-align:center;'>$eventTime</td>
                            <td class='col' style='width: 16.667%; text-align:center;'>$eventLocation</td>
                            <td class='col' style='width: 16.667%; text-align:center;'>$paymentMethod</td>
                            <td class='col' style='width: 16.667%; text-align:center;'>$amountPaid</td>
                    echo "
                        <tr>
                            <td class='col'>$eventType</td>
                            <td class='col'>$eventDate</td>
                            <td class='col'>$eventTime</td>
                            <td class='col'>$eventLocation</td>
                        </tr>
                
                    ";
                  }
                  $conn->close();
                ?>
              </tbody>
            </table>
        </div>
    </div>
    </div>

    <section class="home" id="home">
      <div class="content">
        <h3>Time to celebrate, With best <span>Event Organizer</span>!</h3>
        <button id="book-now" class="book-btn" onclick="openBooking()">Book Now!</button>
      </div>

      <div class="swiper-container home-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="assets/img/home-img-1.jpg" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="assets/img/home-img-2.jpg" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="assets/img/home-img-3.jpg" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="assets/img/home-img-4.jpg" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="assets/img/home-img-5.jpg" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="assets/img/home-img-6.jpg" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="assets/img/home-img-7.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section class="service" id="service">
      <h1 class="heading">our <span>services</span></h1>

      <div class="box-container">
        <div class="box">
          <i class="fa-solid fa-envelope"></i>
          <h3>invitation card design</h3>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
            suscipit.
          </p>
        </div>

        <div class="box">
          <i class="fa-solid fa-camera-retro"></i>
          <h3>photos</h3>
          <p>
            Immerse your events in lasting memories with our expert photography services, we capture the essence of every moment.
          </p>
        </div>

        <div class="box">
          <i class="fa-solid fa-video""></i>
          <h3>video</h3>
          <p>
            Transform your events into unforgettable experiences with our professional video services.
          </p>
        </div>

        <div class="box">
          <i class="fas fa-car"></i>
          <h3>rent vehicles</h3>
          <p>
            Drive your events to perfection with our rental vehicles tailored for special occasions.
          </p>
        </div>
    
        <div class="box">
          <i class="fa-solid fa-music"></i>
          <h3>entertainment</h3>
          <p>
            We bring a touch of magic and excitement to make your occasions truly unforgettable.
          </p>
        </div>

        <div class="box">
          <i class="fa-solid fa-microphone-lines"></i>
          <h3>hosting</h3>
          <p>
            ensuring seamless coordination and unforgettable moments for your events.
          </p>
        </div>

        <div class="box">
          <i class="fas fa-map-marker-alt"></i>
          <h3>venue selection</h3>
          <p>
            Discover the perfect setting for your events with our expert venue selection service.
          </p>
        </div>

        <div class="box">
          <i class="fas fa-birthday-cake"></i>
          <h3>food catering</h3>
          <p>
            a perfect blend of exquisite menus and flawless execution, ensuring an unforgettable culinary experience for every guest.
          </p>
        </div>
      </div>
    </section>

    <section class="about" id="about">
      <h1 class="heading"><span>about</span> us</h1>

      <div class="row">
        <div class="image">
          <img src="assets/img/about-img-1.jpg" alt="" />
        </div>

        <div class="content">
          <h3>Guarantee that every aspect is carried out properly.</h3>
          <p>
            At CatchQoEvents.Ph, we believe that every event deserves to be an extraordinary experience, one that leaves a lasting impression 
            on its attendees. That's why we've dedicated ourselves to providing exceptional event planning services that 
            are tailored to our clients' unique needs and preferences.
          </p>
          <p>
            Contact us today to embark on a journey of creating unforgettable events.
          </p>
          <a href="#" class="r-btn">reach us</a>
        </div>
      </div>
    </section>

    <section class="gallery" id="gallery">
      <h1 class="heading">our <span>gallery</span></h1>

      <div class="box-container">
        <div class="box">
          <img src="assets/img/gallery-img-1.jpg" alt="" />
          <h3 class="title">Francheska @18</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-2.jpg" alt="" />
          <h3 class="title">Maverick 7th Birthday</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-3.jpg" alt="" />
          <h3 class="title">Ann & Jo</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-4.jpg" alt="" />
          <h3 class="title">Margie & Robert</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-5.jpg" alt="" />
          <h3 class="title">Mary @18</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-6.jpg" alt="" />
          <h3 class="title">Joana's Wedding</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-7.jpg" alt="" />
          <h3 class="title">Team building</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-8.jpg" alt="" />
          <h3 class="title">JaDino</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-9.jpg" alt="" />
          <h3 class="title">CatchQo Team</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-10.jpg" alt="" />
          <h3 class="title">Awarding</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-12.jpg" alt="" />
          <h3 class="title">Best Wedding</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>

        <div class="box">
          <img src="assets/img/gallery-img-11.jpg" alt="" />
          <h3 class="title">Janine's Wedding</h3>
          <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
        </div>
      </div>
    </section>

    <section class="review" id="review">
      <h1 class="heading">Customer's <span>Feedback</span></h1>

      <div class="review-slider swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
              <img src="images/img1.jpg" alt="" />
              <div class="user-info">
                <h3>nayana</h3>
                <span>happy customer</span>
              </div>
            </div>
            <p>
              Since Day 1 of our preparations, kayo na ang chosen team namin especially Host Shaine! Thank youu to the whole 
              team from the host, dj, and to our coordinators and assistants.
            </p>
          </div>

          <div class="swiper-slide box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
              <img src="images/img2.jpg" alt="" />
              <div class="user-info">
                <h3>lisa</h3>
                <span>Very Good</span>
              </div>
            </div>
            <p>
              Thank you so much Ms. Shane for a Lively program you've done to our wedding last June 25,2021.Tthank you so much, Gob bless and be safe.
            </p>
          </div>

          <div class="swiper-slide box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
              <img src="images/img3.jpg" alt="" />
              <div class="user-info">
                <h3>mary</h3>
                <span>happy customer</span>
              </div>
            </div>
            <p>
              From beginning to end of the planning of my debut celebration, you made me and my guest feel comfortable and confident. I want to thank you so much for all of 
              your help coordinating my debut!
            </p>
          </div>

          <div class="swiper-slide box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
              <img src="images/img4.jpg" alt="" />
              <div class="user-info">
                <h3>rose</h3>
                <span>Satisfied customer</span>
              </div>
            </div>
            <p>
              Awesome team! Thank you Ma'am Flor and the whole team for helping us thoughout the wedding preparation. 
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="contact" id="contact">
      <h1 class="heading"><span>contact</span> us</h1>

      <form action="">
        <div class="inputBox">
          <input type="text" placeholder="name" />
          <input type="email" placeholder="email" />
        </div>
        <div class="inputBox">
          <input type="tel" placeholder="number" />
          <input type="text" placeholder="subject" />
        </div>
        <textarea
          name=""
          placeholder="message"
          id=""
          cols="30"
          rows="10"
        ></textarea>
        <input type="submit" value="send message" class="sub-btn" />
      </form>
    </section>

    <section class="footer">
      <div class="box-container">

        <div class="box">
          <h3>quick links</h3>
          <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> service </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> about </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> gallery </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> feedback </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> contact </a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
          <a href="#"> <i class="fas fa-envelope"></i> markjustin.pilongo.f@bulsu.edu.ph </a>
          <a href="#"> <i class="fas fa-envelope"></i> stevejanvyn.sanjose.t@bulsu.edu.ph</a>
          <a href="#"> <i class="fas fa-envelope"></i> taizi.correa.p@bulsu.edu.ph</a>
          <a href="#"> <i class="fas fa-envelope"></i> antonio.gunayan.g@bulsu.edu.ph </a>
          <a href="#"> <i class="fas fa-envelope"></i> abram.juanerio.l@bulsu.edu.ph </a>
        </div>

        <div class="box">
          <h3>follow us</h3>
          <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
          <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
          <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
          <a href="#"> <i class="fab fa-linkedin-in"></i> linkedin </a>
        </div>
      </div>

      <div class="credit">
        created by <span>Group 2</span> | all rights reserved
      </div>
    </section>

    <div class="theme-toggler">
      <div class="toggle-btn">
        <i class="fas fa-cog"></i>
      </div>


      <h3>choose color</h3>

      <div class="buttons">
        <div class="theme-btn" style="background: #001F3F"></div>
        <div class="theme-btn" style="background: #6f4f1d"></div>
        <div class="theme-btn" style="background: #800020"></div>
        <div class="theme-btn" style="background: #293940 "></div>
        <div class="theme-btn" style="background: #8a6240"></div>
        <div class="theme-btn" style="background: #00555F"></div>
      </div>
    </div>

    <div class="theme-toggle">
      <div class="toggle-btn">

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="assets/js/script.js"></script>

    <script>
      
      const bookingContainer = document.querySelector('.booking-container');
      const paymentContainer = document.querySelector('.payment-container');
      const creditContainer = document.querySelector('.credit-card-container');
      const paypalContainer = document.querySelector('.paypal-container');

      let openBooking = function(){

        bookingContainer.style.display = 'block';

      }

      let closeBooking = function(){

        bookingContainer.style.display = 'none';

      }

      let closePayment = function(){

        paymentContainer.style.display = 'none';

      }

      let openCreditCard = function(){

        creditContainer.style.display = 'block';
        paypalContainer.style.display = 'none';

      }

      let openPayPal = function(){

      creditContainer.style.display = 'none';
      paypalContainer.style.display = 'block';

      }

      let bookEvent = function(eventevent){
        event.preventDefault();        event.preventDefault();
      paymentContainer.style.display = 'block';

      }

      let submitBooking = function(event, paymentMethod) {
        event.preventDefault();
        const data = {
          paymentMethod,
          eventType: $("#eventType").val(),
          eventDate: $("#eventDate").val(),
          eventTime: $("#eventTime").val(),
          eventLocation: $("#eventLocation").val(),
          creditNumber: $("#creditNumber").val(),
          creditExpire: $("#creditExpire").val(),
          creditCVV: $("#creditCVV").val(),
          creditAmount: $("#creditAmount").val(),
          mobileNumber: $("#mobileNumber").val(),
          paypalAmount: $("#paypalAmount").val(),
        }
        $.ajax({
            type : "POST",
            url  : "booking.php",
            data,
            success: function(res){
              window.location.href = window.location.pathname+"?"+$.param({'booking':'true'});
                    }
        });
      }

      let submitBooking = function(event, paymentMethod) {
        event.preventDefault();
        const data = {
          paymentMethod,
          eventType: $("#eventType").val(),
          eventDate: $("#eventDate").val(),
          eventTime: $("#eventTime").val(),
          eventLocation: $("#eventLocation").val(),
          creditNumber: $("#creditNumber").val(),
          creditExpire: $("#creditExpire").val(),
          creditCVV: $("#creditCVV").val(),
          creditAmount: $("#creditAmount").val(),
          mobileNumber: $("#mobileNumber").val(),
          paypalAmount: $("#paypalAmount").val(),
        }
        $.ajax({
            type : "POST",
            url  : "booking.php",
            data,
            success: function(res){
              window.location.href = window.location.pathname+"?"+$.param({'booking':'true'});
                    }
        });
      }

    </script>

      <script src="https://unpkg.com/scrollreveal"></script>

      <script>
        window.embeddedChatbotConfig = {
        chatbotId: "IvBJPwA46ALb8G7uY_147",
        domain: "www.chatbase.co"
        }
      </script>
      
      <script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="IvBJPwA46ALb8G7uY_147"
        domain="www.chatbase.co"
        defer>
      </script>

  </body>
  <script>
      <?php 
          if(!empty($_GET['booking']))
          { 
            echo "$.toast({
              heading: 'Success',
              text: 'Booking Successful',
              showHideTransition: 'slide',
              icon: 'success'
          })";
          }
      ?>
  </script>
    </script>
</html>
