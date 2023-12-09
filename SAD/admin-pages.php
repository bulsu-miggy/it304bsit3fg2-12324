<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area</title>
  
</head>
<style>
 .tite{
   margin-left: 200px;
   margin-top: 100px;
 }
 body{
    background-image:url(white-and-blue-tone-abstract-bac.jpg);
 }
</style>
<body>
<button onclick="location.href='admin.php'" style=" margin-left: 1200px; height: 20px; ">Logout</button>

<div class="tite">
    <h1>ADMIN AREA</h1>
    <table cellspacing="5" cellpadding="5" border="1" id="user-table">
        <tr>
       
            <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
            <th>LAST NAME</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>DATE</th>
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
            $sql = "SELECT * FROM bookings_record";
            $result = $connection->query($sql);

            if (!$result) {
                die("INVALID query " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                
                    <td>$row[FIRSTNAME]</td>
                    <td>$row[MIDDLENAME]</td>
                    <td>$row[LASTNAME]</td>
                    <td>$row[PHONE]</td>
                    <td>$row[EMAIL]</td>
                    <td>$row[date]</td>
                   
                    <td>
                     
                        <a href='delete.php?id=$row[FIRSTNAME]'><button id='decline'>DECLINE</button></a>
                    </td>
                </tr>
                ";
            }
        ?>
    </table>

    
</div>

</body>
</html>
