<?php
    include('../AdminSide/connection.php');
    $eid = $_POST['eid'];
    $etitle = $_POST['etitle'];
    $eplace = $_POST['eplace'];
    $edate = $_POST['edate'];
    $etype = $_POST['etype'];
    $org = $_POST['org'];

    $query = "UPDATE eventtable SET eventTitle = '$etitle', eventPlace = '$eplace', eventDate = '$edate',
                eventType = '$etype', organizer = '$org' WHERE eventID = '$eid'";
    $result = mysqli_query($connect, $query);
    if($result){
        mysqli_close($connect);
        header('Location: eventtable.php');
        exit();
    }
    else{
        echo "Error" . mysqli_error($result);
    }
?>