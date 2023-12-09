<?php
    
    //PHP INCLUDES

	include "connect.php";

	if(isset($_POST['selected_employee']) && isset($_POST['selected_services']))
	{

		?>

        <!-- START CALENDAR SLOT -->

        <div class="calendar_slots" style="min-width: 700px;">
    
    <div class="appointments_days">
                <?php
                    
                    $appointment_date = date('Y-m-d');

                    for($i = 0; $i < 7; $i++)
                    {
                        $appointment_date = date('Y-m-d', strtotime($appointment_date . ' +1 day'));
                        echo "<div class = 'appointment_day'>";
                            echo date('D', strtotime($appointment_date));
                            echo "<br>";
                            echo date('d', strtotime($appointment_date))." ".date('M', strtotime($appointment_date));
                        echo "</div>";
                    } 
                ?>
            </div>

            <!-- DAY HOURS -->

            <div class = 'available_booking_hours'>
                <?php

                    //SELECTED SERVICES
		            $desired_services = $_POST['selected_services'];
		            
                    //SELECTED EMPLOYEE
		            $selected_employee = $_POST['selected_employee'];

            		//Services Duration - End time expected
		            $sum_duration = 0;
		            
                    foreach($desired_services as $service)
		            {
		                
		                $stmtServices = $con->prepare("select service_duration from services where service_id = ?");
		                $stmtServices->execute(array($service));
		                $rowS =  $stmtServices->fetch();
		                $sum_duration += $rowS['service_duration'];
		                
		            }
            
            
		            $sum_duration = date('H:i',mktime(0,$sum_duration));
		            $secs = strtotime($sum_duration)-strtotime("00:00:00");


                    $open_time = date('H:i',mktime(7,0,0));

                    $close_time = date('H:i',mktime(20,0,0));

                    $start = $open_time;

                    $secs = strtotime($sum_duration)-strtotime("00:00:00");
                    $result = date("H:i:s",strtotime($start)+$secs);


                    $appointment_date = date('Y-m-d');

                    for($i = 0; $i < 7; $i++)
                    {
                        echo "<div class='available_booking_hours_colum'>";

                            $appointment_date = date('Y-m-d', strtotime($appointment_date . ' +1 day'));
                            $start = $open_time;
                            $secs = strtotime($sum_duration)-strtotime("00:00:00");
                            $result = date("h:i A",strtotime($start)+$secs);

                            $day_id = date('w',strtotime($appointment_date));
                            
                            while($start >= $open_time && $result <= $close_time)
                            {
                                // Check If the employee is available

                                $stmt_emp = $con->prepare("
                                    Select employee_id
                                    from employees_schedule
                                    where employee_id = ?
                                    and day_id = ?
                                    and ? between from_hour and to_hour
                                    and ? between from_hour and to_hour
                                       
                                ");
                                $stmt_emp->execute(array($selected_employee,$day_id,$start, $result));
                                $emp = $stmt_emp->fetchAll();

                                //If employee is available

                                if($stmt_emp->rowCount() != 0)
                                {

                                    //Check If there are no intersecting appointments with the current one
                                    $stmt = $con->prepare("
                                        Select * 
                                        from appointments a
                                        where
                                            date(start_time) = ?
                                            and
                                            a.employee_id = ?
                                            and
                                            canceled = 0
                                            and
                                            (   
                                                time(start_time) between ? and ?
                                                or
                                                time(end_time_expected) between ? and ?
                                            )
                                    ");
                                    
                                    $stmt->execute(array($appointment_date,$selected_employee,$start,$result,$start,$result));
                                    $rows = $stmt->fetchAll();
                        
                                    if($stmt->rowCount() != 0)
                                    {
                                        //Show blank cell
                                    }
                                    else
                                    {

                                          echo "<input type=\"radio\" id=\"$appointment_date $start\" name=\"desired_date_time\" value=\"$appointment_date $start $result\">";
                                          echo "<label class=\"available_booking_hour\" for=\"$appointment_date $start\">".date("h:i A", strtotime($start))."</label>";
                                            ?>
                                            <?php
                                    }
                                }
                                else
                                {
                                    //Show Blank cell
                                }
                                

                                $start = strtotime("+15 minutes", strtotime($start));
                                $start =  date('H:i', $start);

                                $secs = strtotime($sum_duration)-strtotime("00:00:00");
                                $result = date("H:i",strtotime($start)+$secs);
                            }

                        echo "</div>";
                    }
                ?>
            </div>
        </div>
	<?php
	}
    else
    {
        header('location: index.php');
        exit();
    }
?>