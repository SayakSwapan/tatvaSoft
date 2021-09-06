<?php include_once 'db_connection.php';
if(isset($_GET) && !empty($_GET)){
    $event_id = $_GET['id'];
    $sql = "Select * FROM `event_occurrence` Where `event_id`=$event_id";
    $result = $conn->query($sql);
  
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $events[] = $row;
    }
    // print_r(count($events));die;
}



?>
 <td colspan="2">
            <strong><a href='./event_list.php'>Event List Page</a></strong>
        </td>
<table>
<tr>
	<td colspan="2">
		<strong>Event View Page</strong>
	</td>
</tr>
			<tr>
                <td>
                    <?php echo $events[0][2] ?>
                </td>
			</tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <table border=1>
                        <?php foreach($events as $event){ ?>
                        
                        <tr>
                            <td>
                            <?php echo $event[3] ?>
                            </td>
                            <td style="width: 100px">
                            <?php 
                           echo  date('D', strtotime($event[3]));
                            ?>
                                
                            </td>
                        </tr>
                    <?php } ?>
                      
                        
                    </table>
                    </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                   Total Recurrence Event: <?php echo count($events) ?>
                </td>
            </tr>
        </table>