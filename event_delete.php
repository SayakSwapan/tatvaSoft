<?php 
include_once 'db_connection.php';
?>
<?php $event_id = $_GET['id'];

$sql = "DELETE FROM `event_details` WHERE `id`=$event_id";
if($conn->query($sql)=== TRUE){
    header('Location:event_list.php');
}else{
    echo "Wrong";
}




?>