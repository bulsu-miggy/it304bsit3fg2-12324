<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&family=Lato:ital,wght@1,700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@200&family=Kanit:ital,wght@1,500&family=Lato:ital,wght@1,700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <title>Home</title>
  </head>
  
  <body style="
      background-image: url(bgpota.jpg);
      background-repeat: no-repeat;
      background-size: cover;
     
    "> 
  <div class="upper">
            <nav>
       <h2 ><span class="ck" style="color: yellow; margin-left: 50px;">Shell</span><span class="sm">| THE PROJECT</h2>
       <ul>
        <li><a href="About.html">About</a></li>
        <li><a href="Services.html">Services</a></li>
        <li><a href="Contact.html">Contact</a></li>
        <li><a href="index2.php">Appointment</a></li>
        <li><a href="index.php">LOGOUT</a></li>
  
        
       </ul>
    </nav>   
        </div>
         

        <div class="context">
      <div class=laman>
     
      </div>
          <div class="laman1">
          <h1 style=" margin-left:100px; margin-top:0px; margin-bottom:20px; color:#D49137; font-family:Oswald">Avoid Hassles & Delays</h1>
           <h2 style="margin-left:100px; color:#4e0506; font-size:30px; padding-right:300px; font-family:Kanit"> 
How is our car today? Sounds like not good!
Don't worry. Book online as you wish with our system.
Make your appointment now.</h2>
<h4 style="color:#ffffff; margin-top:50px; margin-left:100px; font-family:IBM Plex Serif">
      A Web Solution by My Group.
    </h4>
          </div>
        
          <div class="laman2">
          <div class="slider">
 
      <!-- <img src="bg.jpg" alt="Slide 1" style="border-radius:50px; margin-top:20px; margin-right: 100px;"> -->
    </div>
    
    


</div>



      

        </div>

  

      <button class="appointment-button" style="margin-left:600px; ">
        <a href="index2.php" class="appointment-link">Make Appointment</a>
      </button>
    </div>
    </div>
  </body>

  <footer>
   
  </footer>

  <style>
    body{
   
      backdrop-filter: blur(5px);
    }
    .laman2{
      margin-top:100px;
    }
    .laman1{
      
      margin-top:200px;
      padding-right:100px;
      padding-left:50px;
     
    }
    .laman2{
      height:10px;
    }
    .context{
      display:flex;
    }
    
    nav{
display: flex;
width: 100%;

align-items: center;
justify-content: space-between;
font-size: 20px;

border:1px solid #080000;
background-image: linear-gradient(to right, rgb(255, 0, 0), rgb(255, 255, 0));
border-top: none;
border-left: none;
border-right: none;


}
ul{
    margin:0;
    padding:0;
    display:flex;
  }
  
  ul li{
    list-style:none;
    margin:0 20px;
    transition:0.5s;
  }
  
  ul li a{
    display: block;
    position:relative;
    text-decoration:none;
    padding:5px;
    font-size:18px;
    font-family: Bold;
    color:#383434;
    text-transform:uppercase;
    transition:0.5s;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
  }
  
  ul:hover li a{
    transform:scale(1.5);
    opacity:0.2;
    filter:blur(5px);
  }
  
  ul li a:hover{
    transform:scale(2);
    opacity:1;
    filter:blur(0);
    text-decoration:none;
    color:red;
  }
  
  ul li a:before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:#ffd800;
    transition:0.5s;
    transform-origin:right;
    transform:scaleX(0);
    z-index:-1;
  }
  
  ul li a:hover:before{
    transition:transform 0.5s;
    transform-origin:left;
    transform:scaleX(1);
  }




    
    
    .appointment-button {
      margin-top: 5%;
      background-color:#ffd800;
      border-radius: 10px;
      border: none;
      height: 50px;
      width: 160px;
      margin-left:500px;
      font-weight: bold;
      font-size: 15px;
      margin-bottom: 5%;
    }
    .appointment-link {
      color: red;
      text-decoration: none;
    }
    .appointment-link:hover {
      color: yellow;
    }
    .appointment-button:hover {
      background-color:red;
    }

    footer {
      font-size: 20px;
      color: black;
      text-align: center;
      padding: 1em;
      position: sticky;
    }
    .heading-text{
      color:black;
    }
 
      .tite{
        color:black;
        margin-right:650px;
      font-size:20px;
      }
      
    .slider {
      width: 100%;
      overflow: hidden;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      box-sizing: border-box;
    }

    img {
      width: 100%;
      height: auto;
    }

    /* Optional: Add navigation buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* Optional: Style the navigation buttons */
    .prev:hover, .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>
  <script>
  let currentSlide = 0;

  function showSlide(n) {
    const slides = document.querySelector('.slides');
    currentSlide = (n + slides.childElementCount) % slides.childElementCount;
    slides.style.transform = `translateX(${-currentSlide * 100}%)`;
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  // Optional: Auto-advance slides every 5 seconds
  setInterval(nextSlide, 5000);
</script>
</html>
