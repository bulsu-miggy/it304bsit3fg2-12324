<?php
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'sad');
    $stmt = $mysqli->prepare("SELECT * FROM bookings_record WHERE MONTH(DATE) = ? AND YEAR(DATE) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['DATE'];
            }
            
            $stmt->close();
        }
    }
    
    
     $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
     $numberDays = date('t',$firstDayOfMonth);
     $dateComponents = getdate($firstDayOfMonth);
     $monthName = $dateComponents['month'];
     $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');
   
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-success' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    $calendar.= " <a class='btn btn-xs btn-danger' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    
   
      $calendar .= "<tr>";
     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 

     $currentDay = 1;
     $calendar .= "</tr><tr>";


     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     $formattedMonth = str_pad($month, 2, "0", STR_PAD_LEFT);

  
     while ($currentDay <= $numberDays) {

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$formattedMonth-$currentDayRel";

          
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs' disabled>N/A</button>";
         }elseif(in_array($date, $bookings)){
             $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-lock
             '></span> Already Booked</button>";
         }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'> <span class='glyphicon glyphicon-ok'></span> Book Now</a>";
         }
            
          $calendar .="</td>";
          $currentDay++;
          $dayOfWeek++;
     }

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 
         }
     }
     
     $calendar .= "</tr>";
     $calendar .= "</table>";
     echo $calendar;

}
    
?>
    
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
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




       @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;

            }
            
            

            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:#eee;
        }

    </style>
    <body >

    <div class="upper">
            <nav>
            <h2 ><span class="ck" style="color: rgb(226, 230, 30); margin-left: 50px;">
            <a style="text-decoration: none; color: rgb(226, 230, 30);" href="home.php">Shell</a>  </span><span class="sm">| THE PROJECT</h2>
       <ul>
        <li><a href="About.html">About</a></li>
        <li><a href="Services.html">Services</a></li>
        <li><a href="Contact.html">Contact</a></li>
        <li><a href="index2.php">Appointment</a></li>
        <li><a href="index.php">LOGOUT</a></li>
        
       </ul>
    </nav>   
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-danger" style="background:#2ecc71; border:none; color:#fff">
            <h1>Online Book</h1>
            </div>
            <?php
            $dateComponents=getdate();
            if(isset($_GET['month']) && isset($_GET['year'])){
                $month=$_GET['month'];
                $year=$_GET['year'];
            }

            else{
                $month=$dateComponents['month'];
                $year=$dateComponents['year'];
            }
            echo build_calendar(date('m', strtotime($month)), $year);
            ?>
           
            </div>
               
            </div>
        </div>
    </body>
    
</head>


