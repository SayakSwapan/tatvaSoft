<?php
include_once 'db_connection.php';
if (isset($_POST) && !empty($_POST)) {
    $event_title = $_POST['event_title'];
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];
    $event_id = $_POST['event_id'];
    if ($event_id != "") {

        $sql =  "UPDATE event_details
        SET `event_title`='$event_title', `event_start_date`='$event_start_date',`event_end_date`='$event_end_date'
        WHERE `id`=$event_id ";
    } else {
        $sql =  "INSERT INTO event_details (`event_title`,`event_start_date`, `event_end_date`) VALUES ('$event_title', '$event_start_date','$event_end_date' )";
    }
    //  print_r($sql);die;
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        if ($event_id != "") {
            $sql1 =  "UPDATE event_occurrence
        SET `event_title`='$event_title', `event_start_date`='$event_start_date',`event_end_date`='$event_end_date'
        WHERE `event_id`=$last_id ";
        } else {
            $sql1 =  "INSERT INTO event_occurrence (`event_id`,`event_title`,`event_start_date`, `event_end_date`) VALUES ($last_id,'$event_title', '$event_start_date','$event_end_date' )";
        }
        if ($conn->query($sql1) === TRUE) {
            header('Location:event_list.php');
        }
    } else {
        echo "Wrong";
    }
}
