<?php include_once 'db_connection.php';
$sql = "Select * FROM `event_details`";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $events[] = $row;
}
?>

<table>
    <tr>
        <td colspan="2">
            <strong>Event List Page</strong>
        </td>
        <td colspan="2">
            <strong><a href='./index.php'>Event ADD Page</a></strong>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table>
                <tr>
                    <td width="20">
                        <strong>#</strong>
                    </td>
                    <td width="150">
                        <strong>Title</strong>
                    </td>
                    <td width="250">
                        <strong>Dates</strong>
                    </td>
                    <td width="250">
                        <strong>Occurrence</strong>
                    </td>
                    <td width="200">
                        <strong>Actions</strong>
                    </td>
                </tr>

                <?php if (isset($events) && !empty($events)) { ?>
                    <?php foreach ($events as $event) { ?>
                        <tr>
                            <td>
                                <?php echo $event['0'] ?>
                            </td>
                            <td>
                                <?php echo $event['1'] ?>
                            </td>
                            <td>
                                <?php echo $event['2'] ?> To <?php echo $event['3'] ?>
                            </td>
                            <td>
                                <?php echo $event['4'] ?>
                            </td>
                            <td>
                                <button ><a href="./event_view.php?id=<?php echo $event['0']  ?>">View</button>
                                <button><a href="./index.php?id=<?php echo $event['0']  ?>">Edit</a></button>
                                <button ><a href="./event_delete.php?id=<?php echo $event['0']  ?>">Delete</a></button>
                            </td>

                        <?php   } ?>
                        </tr> <?php } ?>


            </table>

    </tr>


    </td>
    </tr>
