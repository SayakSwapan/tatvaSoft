<?php
include_once 'db_connection.php';
if(isset($_GET)&&!empty($_GET)){
    $event_id = $_GET['id'];
    $sql = "Select * FROM `event_details` Where `id`=$event_id";
    $result = $conn->query($sql);
    // $row = mysqli_fetch_assoc($result);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $events[] = $row;
    }
//  print_r($events);die;
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<html>

<body>
    <form action="./event_store.php" method='POST'>
    <table id="TABLE1" language="javascript">
        <tr>
            <td colspan="2">
                <strong>Add Event Page</strong>
            </td>
        </tr>
        <tr>
            <td>
                Event Title:
            </td>
            <td>
           <?php if(isset($_GET) && !empty($_GET)){ ?>
                <input type="hidden" value="<?php echo $events['0'][0] ?>" name='event_id'>
                <input type="text" name='event_title' placeholder="Event Title" value="<?php echo $events['0'][1] != ''? $events['0'][1] :'' ?>" required>
                <?php }else{ ?>
                    <input type="text" name='event_title' placeholder="Event Title"  required>

                <?php } ?>
                
            </td>
        </tr>
        <tr>
            <td>
                Start Date:
            </td>
            <td>
                <input type="date" name='event_start_date' placeholder="Event Start Date" value="<?php echo $events['0'][2] ?>" require>
            </td>
        </tr>
        <tr>
            <td>
                End Date:
            </td>
            <td>
                <input type="date" name='event_end_date' placeholder="Event End Date" value="<?php echo $events['0'][3] ?>" require>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>Recurrence:
            </td>
            <td>
                <input id="Radiobutton2" name="RepeatGroup" tabindex="9" type="radio" value="Radiobutton2" /><label for="Radiobutton2"><span style="font-size: 10pt; font-family: Verdana">Repeat</span></label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<select id="lstRepeatType" class="textbox-medium" name="lstRepeatType" style="font-size: x-small; width: 100px; font-family: Verdana" tabindex="10">
                    <option selected="selected" value="1">Every</option>
                    <option value="2">Every Other</option>
                    <option value="3">Every Third</option>
                    <option value="4">Every Fourth</option>
                </select>
                <select id="lstEvery" class="textbox-medium" name="lstEvery" style="font-size: x-small;
                        width: 66px; font-family: Verdana" tabindex="10">
                    <option selected="selected" value="1">Day</option>
                    <option value="2">Week</option>
                    <option value="3">Month</option>
                    <option value="4">Year</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <INPUT id="RadioButton3" tabIndex=11 type=radio value="RadioButton3" name="RepeatGroup" /><span style="font-size: 10pt; font-family: Verdana">Repeat on the
                    <select id="lstRepeatOn" class="textbox-middle" name="lstRepeatOn" style="font-size: x-small; width: 68px; font-family: Verdana" tabindex="12">
                        <option selected="selected" value="1">First</option>
                        <option value="2">Second</option>
                        <option value="3">Third</option>
                        <option value="4">Fourth</option>
                    </select>
                </span>&nbsp;<select id="lstRepeatWeek" class="textbox-middle" name="lstRepeatWeek" style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                    <option selected="selected" value="0">Sun</option>
                    <option value="1">Mon</option>
                    <option value="2">Tue</option>
                    <option value="3">Wed</option>
                    <option value="4">Thu</option>
                    <option value="5">Fri</option>
                    <option value="6">Sat</option>
                </select>
                of the
                <select id="lstRepeatMonth" class="textbox-middle" language="javascript" name="lstRepeatMonth" style="font-size: x-small; width: 80px;
                        font-family: Verdana" tabindex="14">
                    <option selected="selected" value="1">Month</option>
                    <option value="3">3 Months</option>
                    <option value="4">4 Months</option>
                    <option value="6">6 Months</option>
                    <option value="12">Year</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <button type="submit" value="submit">Submit</button>
                <?php 
                if(isset($_GET) && !empty($_GET)){ ?>
 <button type="submit" value="Back"><a href='./event_list.php'>Back</a></button>
             <?php   }
                ?>
               
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>

            </td>
        </tr>


    </form>
    
       

</html>
<script>
$(document).ready(function(){   
    document.getElementById("lstRepeatType").disabled = true;
    document.getElementById("lstEvery").disabled = true;
    document.getElementById("lstRepeatOn").disabled = true; 
    document.getElementById("lstRepeatWeek").disabled = true;
    document.getElementById("lstRepeatMonth").disabled = true;

    $('input[type=radio][name=RepeatGroup]').change(function() {
    if (this.value == 'RadioButton3') {
        document.getElementById("lstRepeatType").disabled = true;
    document.getElementById("lstEvery").disabled = true;
    document.getElementById("lstRepeatOn").disabled = false; 
    document.getElementById("lstRepeatWeek").disabled = false;
    document.getElementById("lstRepeatMonth").disabled = false;
    }
    else if (this.value == 'Radiobutton2') {
        document.getElementById("lstRepeatType").disabled = false;
    document.getElementById("lstEvery").disabled = false;
    document.getElementById("lstRepeatOn").disabled = true; 
    document.getElementById("lstRepeatWeek").disabled = true;
    document.getElementById("lstRepeatMonth").disabled = true;
    }
});
});

</script>