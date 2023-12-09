<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel = "shortcut icon" href = 
  "./assets/img/logo-1-_white_-circle.ico" 
  type = "image/x-icon">

  <title>Welcome to Events By CatchQo!</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <script src="./assets/js/jquery-3.7.1.js"></script>

</head>
<body>
  
  <div class="container">
    <video autoplay loop muted>
      <source src="./assets/mp4/dinner.mp4" type="video/mp4">
    </video>

    <div class="content">
      <img src="./assets/img/logo-1 (no-bg).png" alt="logo" class="logo">

      <div class="welcome-text">
        <h2>Welcome <br>
          <span>to Events By CatchQo!</span>
        </h2>

        <p>Our goal as event planners is to exceed our clients’ expectations by providing them with extraordinary, and life changing experiences. From the earliest stages of planning until the very last seconds of the event. We make every efforts to guarantee that every aspect is carried out properly.</p>
      </div>
    </div>

    <div class="log-reg-box">
    <?php 
        if(isset($_GET['loginerror'])) {
          $loginerror=$_GET['loginerror'];
        }
        if(!empty($loginerror)){ 
          echo '<p class="errmsg">
          Invalid login credentials,
          Please Try Again..</p>'; }
          ?>
      <div class="form-box login">
        <form action="login_process.php" method="post">
          <h2>Sign In</h2>
          <?php 
          if(!empty($_GET['registered']))
          { 
            echo '<h4>Registration successfully</h4>';
          } ?>
          <div class="input-box">
            <span class="icon">
              <i class='bx bxs-envelope' style='color:#faf1e4'  ></i>
            </span>
            <input id="email" name="email" type="email" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" required>
            <label for="email">Email</label>
          </div>

          <div class="input-box">
            <span class="icon">
              <i class='bx bxs-lock-alt' style='color:#faf1e4' ></i>
            </span>
            <input id="password" name="password" type="password" required>
            <label for="password">Password</label>
          </div>

          <div class="remember-forgot">
            <label>
              <input type="checkbox">
              Remember Me
            </label>
            <a href="#">Forgot Password?</a>
          </div>

          <button type="submitLogin" class="btn">Sign In</button>

          <div class="login-register">
            <p>Don't have an account?
              <a href="#" class="register-link">Sign Up</a>
            </p>
            
          </div>
        </form>
      </div>

      <div class="form-box register">
        <form action="register.php" method="post">
          <h2>Sign Up</h2>

          <div class="input-box">
            <span class="icon">
              <i class='bx bxs-user' style='color:#faf1e4' ></i>
            </span>
            <input id="username" name="username" type="text" required>
            <label for="username">Username</label>
          </div>

          <div class="input-box">
            <span class="icon">
              <i class='bx bxs-envelope' style='color:#faf1e4'  ></i>
            </span>
            <input id="email" name="email" type="email" required>
            <label for="email">Email</label>
          </div>

          <div class="input-box">
            <span class="icon">
              <i class='bx bxs-lock-alt' style='color:#faf1e4' ></i>
            </span>
            <input id="password" name="password" type="password" required>
            <label for="password">Password</label>
          </div>

          <div class="input-box">
            <span class="icon">
              <i class='bx bxs-phone' style='color:#faf1e4'  ></i>
            </span>
            <input type="tel" id="phone" name="phone" required>
            <label for="phone">Mobile Number</label>
          </div>

          <div class="remember-forgot">
            <label>
              <input type="checkbox">
              I agree to the terms & conditions
            </label>
          </div>

          <button type="submitRegister" class="btn">Sign Up</button>

          <div class="login-register">
            <p>Already have an account?
              <a href="#" class="login-link">Sign In</a>
            </p>
            
          </div>
        </form>
      </div>


    </div>
  </div>

  <script src="assets/js/login.js"></script>
</body>
</html>