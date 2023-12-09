<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
  
</head>
<style>
 .tite{
   margin-left: 200px;
   margin-top: 100px;
 }
 .tite2{
    margin-left:300px;
 }
 body{
    background-image:url(tite.jpg);
 }
</style>
<body>


<div class="tite">
    <div class="tite2"><h1>SCHEDULE</h1></div>
    <table cellspacing="5" cellpadding="5" border="1" id="user-table">
        <tr>
            <th>License Number</th>
            <th>Plate Number</th>
            <th>Full Name</th>
            <th>Contact</th>
            <th>Date of Appointment</th>
            <th>Time of Appointment</th>
            <th>Email</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "sad";

            $connection = new mysqli($servername, $username, $password, $database);

            // check connection
            if ($connection->connect_error) {
                die("Connection : ERROR " . $connection->connect_error);
            }

            //read data
            $sql = "SELECT * FROM customer";
            $result = $connection->query($sql);

            if (!$result) {
                die("INVALID query " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[license_number]</td>
                    <td>$row[plate_number]</td>
                    <td>$row[full_name]</td>
                    <td>$row[contact]</td>
                    <td>$row[doa]</td>
                    <td>$row[toa]</td>
                    <td>$row[email]</td>
                   
                </tr>
                ";
            }
        ?>
    </table>

    
</div>

</body>
</html>
